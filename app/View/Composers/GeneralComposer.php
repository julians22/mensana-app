<?php

namespace App\View\Composers;

use App\Models\Category;
use App\Models\Products\Category as ProductsCategory;
use App\Settings\GeneralSetting;
use Illuminate\View\View;

class GeneralComposer
{

    /**
     * Create a new profile composer.
     */
    public function __construct(
        protected GeneralSetting $generalSetting,
    ) {}


    public function compose(View $view)
    {
        $articleCategories = Category::all();
        $productCategories = ProductsCategory::all();

        $quick_call_number = $this->generalSetting->quick_call_number;
        $quick_call_opening_text = $this->generalSetting->quick_call_opening_text;

        $nav_logo = $this->generalSetting->header_logo;
        $footer_logo = $this->generalSetting->footer_logo;

        $address = $this->generalSetting->address;
        $contacts = $this->generalSetting->contacts;
        $socials = $this->generalSetting->socials;
        $catalogue_id = $this->generalSetting->catalogue_id;
        $catalogue_en = $this->generalSetting->catalogue_en;

        // https://wa.me/1XXXXXXXXXX?text=I'm%20interested%20in%20your%20car%20for%20sale
        if (empty($quick_call_opening_text)) {
            $whatsappUrl = 'https://wa.me/'.'62'.$quick_call_number;
        } else {
            $whatsappUrl = 'https://wa.me/'.'62'.$quick_call_number.'?text='.urlencode($quick_call_opening_text);
        }

        $generalSettings = collect([
            'quick_call_number' => $quick_call_number,
            'quick_call_opening_text' => $quick_call_opening_text,
            'nav_logo' => $nav_logo,
            'footer_logo' => $footer_logo,
            'whatsapp_url' => $whatsappUrl,
            'address' => $address,
            'contacts' => $contacts,
            'socials' => $socials,
            'catalogue_id' => $catalogue_id,
            'catalogue_en' => $catalogue_en,
            'articleCategories' => $articleCategories,
            'productCategories' => $productCategories
        ]);

        $view->with('general_settings', $generalSettings);
    }
}
