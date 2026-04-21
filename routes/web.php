<?php

use App\Http\Controllers\CosmicFlowController;
use Illuminate\Support\Facades\Route;

Route::controller(CosmicFlowController::class)->group(function (): void {
    Route::get('/', 'landing')->name('landing');
    Route::get('/step-2/{sign}', 'birthdate')->name('birthdate');
    Route::post('/step-2', 'storeBirthDetails')->name('birth.details.submit');
    Route::get('/final-step', 'contact')->name('reading.contact');
    Route::post('/final-step', 'storeContact')->name('reading.contact.submit');
    Route::get('/generating-reading', 'loading')->name('reading.loading');
    Route::post('/generating-reading', 'loading');
    Route::get('/your-reading', 'summary')->name('reading.summary');
    Route::post('/your-reading', 'summary');
    Route::get('/special-offer', 'sales')->name('sales.page');
    Route::post('/special-offer', 'sales');

    Route::get('/privacy-policy', 'privacyPolicy')->name('privacy.policy');
    Route::get('/terms-service', 'termsService')->name('terms.service');
    Route::get('/disclaimer', 'disclaimer')->name('disclaimer');
    Route::get('/contact-us', 'contactUs')->name('contact.us');
    Route::get('/about-us', 'aboutUs')->name('about.us');

    // Download pages for each sign and access type
    Route::get('/download/vip-aries', 'downloadVipAries')->name('download.vip.aries');
    Route::get('/download/vip-taurus', 'downloadVipTaurus')->name('download.vip.taurus');
    Route::get('/download/vip-gemini', 'downloadVipGemini')->name('download.vip.gemini');
    Route::get('/download/vip-cancer', 'downloadVipCancer')->name('download.vip.cancer');
    Route::get('/download/vip-leo', 'downloadVipLeo')->name('download.vip.leo');
    Route::get('/download/vip-virgo', 'downloadVipVirgo')->name('download.vip.virgo');
    Route::get('/download/vip-libra', 'downloadVipLibra')->name('download.vip.libra');
    Route::get('/download/vip-scorpio', 'downloadVipScorpio')->name('download.vip.scorpio');
    Route::get('/download/vip-sagittarius', 'downloadVipSagittarius')->name('download.vip.sagittarius');
    Route::get('/download/vip-capricorn', 'downloadVipCapricorn')->name('download.vip.capricorn');
    Route::get('/download/vip-aquarius', 'downloadVipAquarius')->name('download.vip.aquarius');
    Route::get('/download/vip-pisces', 'downloadVipPisces')->name('download.vip.pisces');

    Route::get('/download/standard-aries', 'downloadStandardAries')->name('download.standard.aries');
    Route::get('/download/standard-taurus', 'downloadStandardTaurus')->name('download.standard.taurus');
    Route::get('/download/standard-gemini', 'downloadStandardGemini')->name('download.standard.gemini');
    Route::get('/download/standard-cancer', 'downloadStandardCancer')->name('download.standard.cancer');
    Route::get('/download/standard-leo', 'downloadStandardLeo')->name('download.standard.leo');
    Route::get('/download/standard-virgo', 'downloadStandardVirgo')->name('download.standard.virgo');
    Route::get('/download/standard-libra', 'downloadStandardLibra')->name('download.standard.libra');
    Route::get('/download/standard-scorpio', 'downloadStandardScorpio')->name('download.standard.scorpio');
    Route::get('/download/standard-sagittarius', 'downloadStandardSagittarius')->name('download.standard.sagittarius');
    Route::get('/download/standard-capricorn', 'downloadStandardCapricorn')->name('download.standard.capricorn');
    Route::get('/download/standard-aquarius', 'downloadStandardAquarius')->name('download.standard.aquarius');
    Route::get('/download/standard-pisces', 'downloadStandardPisces')->name('download.standard.pisces');
});
