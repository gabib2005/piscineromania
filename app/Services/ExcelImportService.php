<?php
namespace App\Services;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Str;

class ExcelImportService
{
    private float  $markupPercent;
    private string $imagesPublicPath;

    /**
     * Mapare capitol Aquashop.hu (01..19) → categorie PiscineRomania
     */
    private array $chapterMap = [
        '01' => 'Piscine',
        '02' => 'Pompe recirculare',
        '03' => 'Filtre si filtrare',
        '04' => 'Chimicale si tratamente',
        '05' => 'Incalzire apa',
        '06' => 'Iluminat si accesorii',
        '07' => 'Scari si platforme',
        '08' => 'Curatare si aspiratoare',
        '09' => 'Folie si etansare',
        '10' => 'Automatizare si control',
        '11' => 'Saune si spa',
        '12' => 'Furtunuri si racorduri',
        '13' => 'Pompe submersibile',
        '14' => 'Hidromasaj si jacuzzi',
        '15' => 'Pompe de caldura',
        '16' => 'Acoperitori si prelate',
        '17' => 'Robinete si vane',
        '18' => 'Masurare si testare',
        '19' => 'Diverse',
    ];

    public function __construct()
    {
        $this->markupPercent    = (float) env('PRICE_MARKUP_PERCENT', 10);
        $this->imagesPublicPath = public_path('images/products');
    }

    public function import(string|\Illuminate\Http\UploadedFile $file): array
    {
        $added   = 0;
        $updated = 0;
        $errors  = 0;

        $path = ($file instanceof \Illuminate\Http\UploadedFile)
            ? $file->getRealPath()
            : $file;

        try {
            (new FastExcel)->import($path, function ($row) use (&$added, &$updated, &$errors) {
                try {
                    $this->processRow($row, $added, $updated);
                } catch (\Exception $e) {
                    $errors++;
                    \Log::warning('Excel import row error: ' . $e->getMessage());
                }
            });
        } catch (\Exception $e) {
            \Log::error('Excel import failed: ' . $e->getMessage());
            $errors++;
        }

        return compact('added', 'updated', 'errors');
    }

    private function processRow(array $row, int &$added, int &$updated): void
    {
        // Coloane reale din fișierele Aquashop.hu
        $code = trim($row['Numărul articolului'] ?? $row['Numarul articolului'] ?? '');
        $name = trim($row['Denumirea produsului'] ?? $row['Denumirea'] ?? '');

        if (empty($code) || empty($name)) return;

        $chapterRaw   = trim($row['Capitolul'] ?? '');
        $chapterKey   = str_pad($chapterRaw, 2, '0', STR_PAD_LEFT); // "2" → "02"
        $categoryName = $this->chapterMap[$chapterKey] ?? 'Diverse';

        $description = trim($row['Descriere produs'] ?? $row['Descriere'] ?? '');

        // Prețul nu există în xlsx → rămâne 0, adminul îl actualizează manual
        $priceEur = 0.0;
        $priceRon = 0.0;

        // Categorie
        $category = Category::firstOrCreate(
            ['name' => $categoryName],
            ['slug' => Str::slug($categoryName), 'is_active' => true]
        );

        // Imagine principală locală
        $localImagePath = $this->imagesPublicPath . DIRECTORY_SEPARATOR . $code . '.png';
        $imageUrl       = file_exists($localImagePath)
            ? '/images/products/' . $code . '.png'
            : null;

        $data = [
            'name'         => $name,
            'description'  => $description,
            'price'        => $priceRon,
            'price_eur'    => $priceEur,
            'category_id'  => $category->id,
            'image_url'    => $imageUrl,
            'is_active'    => true,
            'stock_status' => 'in_stock',
        ];

        $product = Product::where('code', $code)->first();

        if ($product) {
            $product->update($data);
            $updated++;
        } else {
            $product = Product::create(array_merge($data, ['code' => $code]));
            $added++;
        }

        // Sincronizează ProductImage records
        $this->syncProductImages($product, $code);
    }

    private function syncProductImages(Product $product, string $code): void
    {
        $imagesToSync = [];

        $main = $this->imagesPublicPath . DIRECTORY_SEPARATOR . $code . '.png';
        if (file_exists($main)) {
            $imagesToSync[] = [
                'product_id' => $product->id,
                'image_url'  => '/images/products/' . $code . '.png',
                'is_primary' => true,
                'sort_order' => 0,
            ];
        }

        for ($i = 2; $i <= 5; $i++) {
            $extra = $this->imagesPublicPath . DIRECTORY_SEPARATOR . $code . '_' . $i . '.png';
            if (file_exists($extra)) {
                $imagesToSync[] = [
                    'product_id' => $product->id,
                    'image_url'  => '/images/products/' . $code . '_' . $i . '.png',
                    'is_primary' => false,
                    'sort_order' => $i - 1,
                ];
            }
        }

        if (empty($imagesToSync)) return;

        ProductImage::where('product_id', $product->id)->delete();
        ProductImage::insert($imagesToSync);
    }

    private function getBnrRate(): float
    {
        try {
            $response = @file_get_contents('https://www.bnr.ro/nbrfxrates.xml', false, stream_context_create([
                'http' => ['timeout' => 5]
            ]));
            if ($response) {
                $xml = simplexml_load_string($response);
                foreach ($xml->Body->Cube->Rate as $rate) {
                    if ((string)$rate['currency'] === 'EUR') {
                        return (float) $rate;
                    }
                }
            }
        } catch (\Exception $e) {}

        return 5.0;
    }
}
