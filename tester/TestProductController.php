<?php
/**
 *
 * Author:  Asror Zakirov
 * Created: 29.06.2017 19:06
 * https://www.linkedin.com/in/asror-zakirov-167961a9
 * https://www.facebook.com/asror.zakirov
 * https://github.com/asror-z
 */

namespace zetsoft\cncmd\tester;


use zetsoft\models\shop\ShopBrand;
use zetsoft\models\shop\ShopCatalog;
use zetsoft\models\shop\ShopCategory;
use zetsoft\models\user\UserCompany;
use zetsoft\models\shop\ShopElement;
use zetsoft\models\shop\ShopOption;
use zetsoft\models\shop\ShopProduct;
use zetsoft\models\App\eyuf\Catalog;
use zetsoft\system\Az;
use zetsoft\system\control\ZControlCmd;


use Faker;


class TestProductController extends ZControlCmd
{


    /**
     * @var Faker\Generator
     */
    public $faker;
    public $faker_en;
    public $elements;
    public $companies;

    public function init()
    {
        $this->elements = collect(ShopElement::find()->asArray()->all());
        $this->companies = collect(UserCompany::find()->asArray()->all());

        $this->faker = Faker\Factory::create();
        $this->faker->addProvider(new Faker\Provider\ru_RU\Person($this->faker));
        $this->faker->addProvider(new Faker\Provider\ru_RU\Address($this->faker));
        $this->faker->addProvider(new Faker\Provider\ru_RU\Company($this->faker));
        $this->faker->addProvider(new Faker\Provider\ru_RU\PhoneNumber($this->faker));
        $this->faker->addProvider(new Faker\Provider\ru_RU\Internet($this->faker));
        $this->faker->addProvider(new Faker\Provider\ru_RU\Payment($this->faker));
        $this->faker->addProvider(new Faker\Provider\ru_RU\Text($this->faker));
        $this->faker->addProvider(new Faker\Provider\ru_RU\Color($this->faker));
        $this->faker->addProvider(new Faker\Provider\Image($this->faker));


        $this->faker_en = Faker\Factory::create();
        $this->faker_en->addProvider(new Faker\Provider\en_US\Person($this->faker_en));
        $this->faker_en->addProvider(new Faker\Provider\en_US\Address($this->faker_en));
        $this->faker_en->addProvider(new Faker\Provider\en_US\Company($this->faker_en));
        $this->faker_en->addProvider(new Faker\Provider\en_US\PhoneNumber($this->faker_en));
        $this->faker_en->addProvider(new Faker\Provider\en_US\Payment($this->faker_en));
        $this->faker_en->addProvider(new Faker\Provider\en_US\Text($this->faker_en));
        $this->faker_en->addProvider(new Faker\Provider\Image($this->faker_en));

    }

    public function actionRun()
    {
        //$this->createProducts(1, 2225);
        //Az::$app->market->element->saveElements(ShopProduct::findOne(20));
   //$this->seva_elements_to_exist_products();
  $this->save_catalogs_to_exist_elements();

//        $products = ShopProduct::find()->where(['shop_category_id' => 2614])->all()

//


        /*  ShopCatalog::deleteAll();
        render\cards\ZVMarketWidget\ready\main.php*/
    }

    public function save_catalogs_to_exist_elements()
    {
        $products = ShopProduct::find()->all();
        foreach ($products as $product) {
            $this->createUserCompany($product->id);
        }
    }

    public function seva_elements_to_exist_products()
    {
        $all_products = ShopProduct::find()->all();
        foreach ($all_products as $product)
        {
            Az::$app->market->element->saveElements($product);
        }
    }
    public function createUserCompany($product_id)
    {
    
        $elements = $this->elements->where('shop_product_id', $product_id);

        $number_companies = $this->companies->where('type', 'market')->count();
        
        foreach ($elements as $element) {
            $companies = $this->faker
                ->randomElements($this->companies->where('type', 'market')->toArray(), $this->faker->numberBetween(0, $number_companies));

            foreach ($companies as $company) {
                $catalog = new ShopCatalog();
                /*  $catalog->offer = [
                      ["end" => "2020-07-14 09:45:12", "offer" => "top_sell", "start" => "2020-06-02 05:25:12"],
                      ["end" => "2020-07-14 09:45:12", "offer" => "new", "start" => "2020-06-02 05:25:12"],
                      ["end" => "2020-07-14 09:45:12", "offer" => "free_delivery", "start" => "2020-06-02 05:25:12"],
                      ["end" => "2020-07-14 09:45:12", "offer" => "super_offer", "start" => "2020-06-02 05:25:12"],
                      ["end" => "2020-07-14 09:45:12", "offer" => "deal_of_day", "start" => "2020-06-02 05:25:12"]
                  ];*/

                $catalog->amount = $this->faker->numberBetween(1, 10000);
                $catalog->price = $this->faker->numberBetween(500, 10000000);
                $catalog->price_old = $catalog->price * $this->faker->numberBetween(11, 20) / 10;
                $catalog->currency = 'UZS';
                $catalog->available = true;
                $catalog->user_company_id = $company['id'];
                $catalog->shop_element_id = $element['id'];

                $catalog->save();
            }
        }
    }

    public function createProducts($numberProducts, $category_id)
    {
        $category = ShopCategory::findOne($category_id);

        for ($i = 0; $i < $numberProducts; $i++) {
            $product_name_word_count = $this->faker->numberBetween($min = 1, $max = 3);
            $shop_product = new ShopProduct();
            $shop_product->name = $this->faker->sentence($product_name_word_count, true);
            $name_ru = $this->faker->sentence($product_name_word_count, true);
            $name_lang = '{
               "en":"' . $shop_product->name . '",
               "ru":"' . $name_ru . '",
               "uz":"' . $name_ru . ',
               "uzk":"' . $name_ru . '
            }';
            $shop_product->name_lang = $name_lang;

            //title
            $product_title_word_count = $this->faker->numberBetween($min = 10, $max = 40);
            $shop_product->title = $this->faker_en->sentence($product_title_word_count, true);
            $title_ru = $this->faker->sentence($product_title_word_count, true);
            $shop_product->title_lang = '{
               "en":"' . $shop_product->title . '",
               "ru":"' . $title_ru . '",
               "uz":"' . $title_ru . ',
               "uzk":"' . $title_ru . '
            }';

            //text
            $product_text_word_count = $this->faker->numberBetween($min = 100, $max = 300);
            $shop_product->text = $this->faker_en->sentence($product_text_word_count, true);
            $text_ru = $this->faker->sentence($product_text_word_count, true);
            $shop_product->text_lang = '{
               "en":"' . $shop_product->text . '",
               "ru":"' . $text_ru . '",
               "uz":"' . $text_ru . ',
               "uzk":"' . $text_ru . '
            }';

            //category_id
            $shop_product->shop_category_id = $category_id;

            //brand_id
            $brand_ids = $category->shop_brand_ids;
            $shop_product->shop_brand_id = (int)$this->faker->randomElement($brand_ids);

            //shop_option_ids
            $shop_option_ids_result = [];
            $core_option_types = $category->shop_option_type;
            foreach ($core_option_types as $core_option_type) {

                $core_options = ShopOption::find()->where([
                    'shop_option_type_id' => (int)$core_option_type['shop_option_type_id']
                ])->all();

                $shop_option_ids = array_map(function ($a) {
                    return $a->id;
                }, $core_options);

                $multi = array_key_exists('is_combination', $core_option_type);

                if ($multi) {
                    $sub_arr = $this->faker->randomElements(
                        $shop_option_ids,
                        $this->faker->numberBetween(1, count($shop_option_ids))
                    );
                    $shop_option_ids_result = array_merge($shop_option_ids_result, $sub_arr);

                } else {
                    $shop_option_ids_result[] = $this->faker->randomElement($shop_option_ids, 1);
                }

            }
            $shop_option_ids_result = array_filter($shop_option_ids_result, function ($a) {
                if ($a != null)
                    return true;
            });
            $shop_product->shop_option_ids = $shop_option_ids_result;

            //related
            $products = ShopProduct::find()->all();
            $product_ids = array_map(function ($a) {
                return $a->id;
            }, $products);
            $shop_product->related = $this->faker->randomElements(
                $product_ids,
                $this->faker->numberBetween(0, count($product_ids))
            );


            //usefull time
            //date($format = 'Y-m-d', $max = 'now') // '1979-06-09'
            //time($format = 'H:i:s', $max = 'now') 
            /*$shop_product->useful_time = $this->faker->date($format = 'Y-m-d', $min = 'now') . $this->faker->time($format = 'H:i:s', $min = 'now');*/


            //weight
            $shop_product->weight = $this->faker->numberBetween(100, 10000);

            //weight
            $shop_product->rating = $this->faker->numberBetween(0, 5);

            //measure
            $measures = [
                'pcs',
                'm',
                'l',
                'kg',
            ];
            $shop_product->measure = $this->faker->randomElement($measures);

            $shop_product->save();

        }
    }

    public function createCatalogs($category_id)
    {
        $products = ShopProduct::find()->where([
            'shop_category_id' => $category_id
        ])->all();

        foreach ($products as $product) {
            $elements = ShopElement::find()->where([
                'shop_product_id' => $product->id
            ])->all();

            $num = $this->faker->numberBetween(1, count($elements));
            $part_elements = $this->faker->randomElements($elements, $num);


            $companies = UserCompany::find()->all();
            foreach ($part_elements as $element) {
                $num = $this->faker->numberBetween(1, count($companies));
                $part_companies = $this->faker->randomElements($companies, $num);
                foreach ($part_companies as $part_company) {
                    $catalog = ShopCatalog::find()->where([
                        'user_company_id' => $part_company->id,
                        'shop_element_id' => $elements->id,
                    ])->one();

                    if ($catalog == null) {
                        $catalog = new Catalog();
                    }

                    $catalog->user_company_id = $part_company->id;
                    $catalog->shop_element_id = $element->id;

                    //$catalog->
                }

            }
        }
    }

    public function change()
    {
        $shop_products = ShopProduct::find()->asArray()->all();
        foreach ($shop_products as $shop_product) {
            $str = $shop_product->shop_option_ids;
            if (!is_array($str) and $str != "")
                vdd($str);
        }
    }
}
