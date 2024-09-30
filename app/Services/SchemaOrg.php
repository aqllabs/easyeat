<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Log;
use Spatie\SchemaOrg\Article;
use Spatie\SchemaOrg\Schema;

class SchemaOrg
{
    public function article($article): ?string
    {
        try {
            $webPage = Schema::webPage()->url(route('blog.article', $article));
            $organization = Schema::organization()
                ->name(config('app.name'));

            $articleSchema = Schema::article()
                ->name($article->seo_title ?? $article->title)
                ->if($article->user, function (Article $schemaArticle) use ($article) {
                    $author = Schema::person()
                        ->name($article->user->name);

                    return $schemaArticle->author($author);
                })
                ->image($article->icon)
                ->url(route('blog.article', $article))
                ->headline($article->seo_title ?? $article->title)
                ->datePublished($article->created_at)
                ->mainEntityOfPage($webPage)
                ->publisher($organization);

            return $articleSchema->toScript();
        } catch (Exception $e) {
            Log::error($e);

            return null;
        }
    }

    public function organization(): ?string
    {
        try {
            $founders = array_map(static function ($founder) {
                return Schema::person()->name($founder['name']);
            }, __('schema.organization.founders'));

            $address = Schema::postalAddress()
                ->streetAddress(__('schema.organization.address.street_address'))
                ->addressLocality(__('schema.organization.address.address_locality'))
                ->postalCode(__('schema.organization.address.postal_code'))
                ->addressCountry(__('schema.organization.address.address_country'));

            $contactPoint = Schema::contactPoint()
                ->contactType(__('schema.organization.contact_point.contact_type'))
                ->telephone(__('schema.organization.contact_point.telephone'))
                ->areaServed(__('schema.organization.contact_point.area_served'))
                ->availableLanguage(__('schema.organization.contact_point.available_language'))
                ->email(__('schema.organization.contact_point.email'));

            $offers = array_map(static function ($offer) {
                return Schema::offer()->itemOffered(Schema::service()->name($offer));
            }, __('schema.organization.offerCatalog.itemListElement'));

            $offerCatalog = Schema::offerCatalog()
                ->name(__('schema.organization.offerCatalog.name'))
                ->itemListElement($offers);

            $localBusiness = Schema::onlineBusiness()
                ->name(__('schema.organization.name'))
                ->url(__('schema.organization.url'))
                ->description(__('schema.organization.description'))
                ->foundingDate(__('schema.organization.founding_date'))
                ->founders($founders)
                ->address($address)
                ->contactPoint($contactPoint)
                ->awards(__('schema.organization.awards'))
                ->hasOfferCatalog($offerCatalog)
                ->sameAs(__('schema.organization.same_as'));

            return $localBusiness->toScript();
        } catch (Exception $e) {
            Log::error($e);

            return null;
        }
    }

    public function reviews($reviews): array
    {
        try {
            foreach ($reviews as $review) {
                $reviewSchema = Schema::review()
                    ->itemReviewed(Schema::onlineBusiness()
                        ->name('Organization')
                        ->url('https://example.com'))
                    ->author(Schema::person()
                        ->name('Reviewer Name'))
                    ->reviewRating(Schema::rating()
                        ->ratingValue(5)
                        ->bestRating(5))
                    ->reviewBody('Review text')
                    ->datePublished(now());

                // Add each review schema to the reviews array
                $reviews[] = $reviewSchema;
            }

            // Convert the array of review schemas into JSON-LD scripts
            return array_map(static function ($schema) {
                return $schema->toScript();
            }, $reviews);
        } catch (Exception $e) {
            Log::error($e);

            return [];
        }
    }
}
