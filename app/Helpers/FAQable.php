<?php 

namespace App\Helpers;

use App\Models\FAQ;

Trait FAQable
{
    public function hasFAQ()
    {
        return (bool) $this->faqs()->count();
    }

    public function faqable()
    {
        return $this->morphTo();
    }

    public function faq()
    {
        return $this->morphOne(FAQ::class, 'faqable');
    }

    public function faqs()
    {
        return $this->morphMany(FAQ::class, 'faqable');
    }

    public function deleteFaq()
    {
        return $this->faq()->delete();
    }

    public function saveFaq($request)
    {   
        foreach (array_filter($request->title) as $key => $value) {
            $this->faq()->create([
                'title' => $value,
                'description' => $request->faq_des[$key],
            ]);
        }

        return $this;
    }
}