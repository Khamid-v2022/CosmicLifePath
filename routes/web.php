<?php

use App\Http\Controllers\CosmicFlowController;
use Illuminate\Support\Facades\Route;

Route::controller(CosmicFlowController::class)->group(function (): void {
    Route::get('/', 'landing')->name('landing');
    Route::get('/birth-alignment/{sign}', 'birthdate')->name('birthdate');
    Route::post('/birth-alignment', 'storeBirthDetails')->name('birth.details.submit');

    Route::get('/final-alignment/{sign}', 'contact')->name('reading.contact');
    Route::post('/final-alignment', 'storeContact')->name('reading.contact.submit');
    Route::get('/path-unfolding/{sign}', 'readingRoading')->name('reading.loading');
    
    Route::get('/preview-reveal/{sign}', 'summary')->name('reading.summary');
    Route::post('/preview-reveal/{sign}', 'summary')->name('reading.summary');
    Route::get('/private-offer/{sign}', 'sales')->name('sales.page');
    Route::post('/private-offer/{sign}', 'sales')->name('sales.page');


    // Need to remove this route after approved
    Route::get('/special-offer', 'sales_dummy');



    Route::get('/privacy-policy', 'privacyPolicy')->name('privacy.policy');
    Route::get('/terms-service', 'termsService')->name('terms.service');
    Route::get('/disclaimer', 'disclaimer')->name('disclaimer');
    Route::get('/contact-us', 'contactUs')->name('contact.us');
    Route::get('/about-us', 'aboutUs')->name('about.us');

    // Download pages for each sign and access type
    Route::get('/vdl-F8qXp2Rv7Lm4Ka', 'downloadVIP')->defaults('sign', 'aries')->name('download.vip.aries');
    Route::get('/vdl-C3mLp9Qa2Rv8Nx', 'downloadVIP')->defaults('sign', 'taurus')->name('download.vip.taurus');
    Route::get('/vdl-B7xQa4Lm9Rv2Kp', 'downloadVIP')->defaults('sign', 'gemini')->name('download.vip.gemini');
    Route::get('/vdl-D2vNx8Lp3Qa7Rm', 'downloadVIP')->defaults('sign', 'cancer')->name('download.vip.cancer');
    Route::get('/vdl-J9mRv1Qa7Lp4Xk', 'downloadVIP')->defaults('sign', 'leo')->name('download.vip.leo');
    Route::get('/vdl-U5qNx7Lm2Rv8Ka', 'downloadVIP')->defaults('sign', 'virgo')->name('download.vip.virgo');
    Route::get('/vdl-W8xQa3Lp9Rm2Kv', 'downloadVIP')->defaults('sign', 'libra')->name('download.vip.libra');
    Route::get('/vdl-S4mLp7Nx8Qa1Rv', 'downloadVIP')->defaults('sign', 'scorpio')->name('download.vip.scorpio');
    Route::get('/vdl-E6qRv2Lp8Ka4Xm', 'downloadVIP')->defaults('sign', 'sagittarius')->name('download.vip.sagittarius');
    Route::get('/vdl-G2xLm9Qa7Rv5Kp', 'downloadVIP')->defaults('sign', 'capricorn')->name('download.vip.capricorn');
    Route::get('/vdl-I7pNx4Rv8Qa3Km', 'downloadVIP')->defaults('sign', 'aquarius')->name('download.vip.aquarius');
    Route::get('/vdl-O9mQa2Lp7Rv1Xn', 'downloadVIP')->defaults('sign', 'pisces')->name('download.vip.pisces');

    Route::get('/sdl-Q8mX2pRv7Ka9Ln', 'downloadStandard')->defaults('sign', 'aries')->name('download.standard.aries');
    Route::get('/sdl-M4qLp8Nx2Ra7Kv', 'downloadStandard')->defaults('sign', 'taurus')->name('download.standard.taurus');
    Route::get('/sdl-Z7pQx3Lm9Rv2Ka', 'downloadStandard')->defaults('sign', 'gemini')->name('download.standard.gemini');
    Route::get('/sdl-H2vNx8Qa4Lp7Rm', 'downloadStandard')->defaults('sign', 'cancer')->name('download.standard.cancer');
    Route::get('/sdl-X9mRv2Lp7Ka3Qn', 'downloadStandard')->defaults('sign', 'leo')->name('download.standard.leo');
    Route::get('/sdl-P5qNx7Lm1Rv8Ka', 'downloadStandard')->defaults('sign', 'virgo')->name('download.standard.virgo');
    Route::get('/sdl-T8xQa2Lp9Rm4Kv', 'downloadStandard')->defaults('sign', 'libra')->name('download.standard.libra');
    Route::get('/sdl-R3mLp7Nx8Qa2Kv', 'downloadStandard')->defaults('sign', 'scorpio')->name('download.standard.scorpio');
    Route::get('/sdl-N6qRv1Lp8Ka4Xm', 'downloadStandard')->defaults('sign', 'sagittarius')->name('download.standard.sagittarius');
    Route::get('/sdl-Y2xLm9Qa7Rv3Kp', 'downloadStandard')->defaults('sign', 'capricorn')->name('download.standard.capricorn');
    Route::get('/sdl-L7pNx4Rv8Qa2Km', 'downloadStandard')->defaults('sign', 'aquarius')->name('download.standard.aquarius');
    Route::get('/sdl-K9mQa3Lp7Rv1Xn', 'downloadStandard')->defaults('sign', 'pisces')->name('download.standard.pisces');
    
    Route::get('/download/fullreport', 'downloadFullReport')->name('download.fullreport');

    // Upsell1 pages for each sign
    // Route::get('/u1-Q7mX2pRv8Ka4Ln', 'upsell1')->defaults('sign', 'aries')->name('upsell1.aries');
    // Route::get('/u1-M3qLp9Nx2Ra7Kv', 'upsell1')->defaults('sign', 'taurus')->name('upsell1.taurus');
    // Route::get('/u1-Z8pQx4Lm7Rv2Ka', 'upsell1')->defaults('sign', 'gemini')->name('upsell1.gemini');
    // Route::get('/u1-H2vNx7Qa5Lp8Rm', 'upsell1')->defaults('sign', 'cancer')->name('upsell1.cancer');
    // Route::get('/u1-X9mRv3Lp7Ka2Qn', 'upsell1')->defaults('sign', 'leo')->name('upsell1.leo');
    // Route::get('/u1-P5qNx8Lm1Rv7Ka', 'upsell1')->defaults('sign', 'virgo')->name('upsell1.virgo');
    // Route::get('/u1-T7xQa2Lp9Rm4Kv', 'upsell1')->defaults('sign', 'libra')->name('upsell1.libra');
    // Route::get('/u1-R4mLp8Nx7Qa2Kv', 'upsell1')->defaults('sign', 'scorpio')->name('upsell1.scorpio');
    // Route::get('/u1-N6qRv2Lp8Ka5Xm', 'upsell1')->defaults('sign', 'sagittarius')->name('upsell1.sagittarius');
    // Route::get('/u1-Y3xLm9Qa7Rv4Kp', 'upsell1')->defaults('sign', 'capricorn')->name('upsell1.capricorn');
    // Route::get('/u1-L8pNx4Rv7Qa2Km', 'upsell1')->defaults('sign', 'aquarius')->name('upsell1.aquarius');
    // Route::get('/u1-K9mQa3Lp8Rv1Xn', 'upsell1')->defaults('sign', 'pisces')->name('upsell1.pisces');

    Route::get('/u1-H2vNx7Qa5Lp8Rm', 'upsell1Dummy')->defaults('sign', 'cancer')->name('upsell1.cancer');
    Route::get('/u1-Q7mX2pRv8Ka4Ln', 'upsell1Dummy')->defaults('sign', 'aries')->name('upsell1.aries');
    Route::get('/u1-M3qLp9Nx2Ra7Kv', 'upsell1Dummy')->defaults('sign', 'taurus')->name('upsell1.taurus');
    Route::get('/u1-Z8pQx4Lm7Rv2Ka', 'upsell1Dummy')->defaults('sign', 'gemini')->name('upsell1.gemini');
    Route::get('/u1-H2vNx7Qa5Lp8Rm', 'upsell1Dummy')->defaults('sign', 'cancer')->name('upsell1.cancer');
    Route::get('/u1-X9mRv3Lp7Ka2Qn', 'upsell1Dummy')->defaults('sign', 'leo')->name('upsell1.leo');
    Route::get('/u1-P5qNx8Lm1Rv7Ka', 'upsell1Dummy')->defaults('sign', 'virgo')->name('upsell1.virgo');
    Route::get('/u1-T7xQa2Lp9Rm4Kv', 'upsell1Dummy')->defaults('sign', 'libra')->name('upsell1.libra');
    Route::get('/u1-R4mLp8Nx7Qa2Kv', 'upsell1Dummy')->defaults('sign', 'scorpio')->name('upsell1.scorpio');
    Route::get('/u1-N6qRv2Lp8Ka5Xm', 'upsell1Dummy')->defaults('sign', 'sagittarius')->name('upsell1.sagittarius');
    Route::get('/u1-Y3xLm9Qa7Rv4Kp', 'upsell1Dummy')->defaults('sign', 'capricorn')->name('upsell1.capricorn');
    Route::get('/u1-L8pNx4Rv7Qa2Km', 'upsell1Dummy')->defaults('sign', 'aquarius')->name('upsell1.aquarius');
    Route::get('/u1-K9mQa3Lp8Rv1Xn', 'upsell1Dummy')->defaults('sign', 'pisces')->name('upsell1.pisces');

    // Upsell2 pages for each sign
    // Route::get('/u2-F7qXp2Rv8Lm4Ka', 'upsell2')->defaults('sign', 'aries')->name('upsell2.aries');
    // Route::get('/u2-C3mLp8Qa2Rv9Nx', 'upsell2')->defaults('sign', 'taurus')->name('upsell2.taurus');
    // Route::get('/u2-B8xQa4Lm9Rv2Kp', 'upsell2')->defaults('sign', 'gemini')->name('upsell2.gemini');
    // Route::get('/u2-D2vNx7Lp3Qa8Rm', 'upsell2')->defaults('sign', 'cancer')->name('upsell2.cancer');
    // Route::get('/u2-J9mRv1Qa8Lp4Xk', 'upsell2')->defaults('sign', 'leo')->name('upsell2.leo');
    // Route::get('/u2-U5qNx7Lm3Rv8Ka', 'upsell2')->defaults('sign', 'virgo')->name('upsell2.virgo');
    // Route::get('/u2-W7xQa3Lp9Rm2Kv', 'upsell2')->defaults('sign', 'libra')->name('upsell2.libra');
    // Route::get('/u2-S4mLp8Nx7Qa1Rv', 'upsell2')->defaults('sign', 'scorpio')->name('upsell2.scorpio');
    // Route::get('/u2-E6qRv2Lp9Ka4Xm', 'upsell2')->defaults('sign', 'sagittarius')->name('upsell2.sagittarius');
    // Route::get('/u2-G2xLm8Qa7Rv5Kp', 'upsell2')->defaults('sign', 'capricorn')->name('upsell2.capricorn');
    // Route::get('/u2-I7pNx4Rv9Qa3Km', 'upsell2')->defaults('sign', 'aquarius')->name('upsell2.aquarius');
    // Route::get('/u2-O9mQa2Lp8Rv1Xn', 'upsell2')->defaults('sign', 'pisces')->name('upsell2.pisces');

    Route::get('/u2-F7qXp2Rv8Lm4Ka', 'upsell2Dummy')->defaults('sign', 'aries')->name('upsell2.aries');
    Route::get('/u2-C3mLp8Qa2Rv9Nx', 'upsell2Dummy')->defaults('sign', 'taurus')->name('upsell2.taurus');
    Route::get('/u2-B8xQa4Lm9Rv2Kp', 'upsell2Dummy')->defaults('sign', 'gemini')->name('upsell2.gemini');
    Route::get('/u2-D2vNx7Lp3Qa8Rm', 'upsell2Dummy')->defaults('sign', 'cancer')->name('upsell2.cancer');
    Route::get('/u2-J9mRv1Qa8Lp4Xk', 'upsell2Dummy')->defaults('sign', 'leo')->name('upsell2.leo');
    Route::get('/u2-U5qNx7Lm3Rv8Ka', 'upsell2Dummy')->defaults('sign', 'virgo')->name('upsell2.virgo');
    Route::get('/u2-W7xQa3Lp9Rm2Kv', 'upsell2Dummy')->defaults('sign', 'libra')->name('upsell2.libra');
    Route::get('/u2-S4mLp8Nx7Qa1Rv', 'upsell2Dummy')->defaults('sign', 'scorpio')->name('upsell2.scorpio');
    Route::get('/u2-E6qRv2Lp9Ka4Xm', 'upsell2Dummy')->defaults('sign', 'sagittarius')->name('upsell2.sagittarius');
    Route::get('/u2-G2xLm8Qa7Rv5Kp', 'upsell2Dummy')->defaults('sign', 'capricorn')->name('upsell2.capricorn');
    Route::get('/u2-I7pNx4Rv9Qa3Km', 'upsell2Dummy')->defaults('sign', 'aquarius')->name('upsell2.aquarius');
    Route::get('/u2-O9mQa2Lp8Rv1Xn', 'upsell2Dummy')->defaults('sign', 'pisces')->name('upsell2.pisces');

    // Route::get('/u3-P7xRv2Mq8Ld', 'upsell3')->name('upsell3');
    Route::get('/u3-P7xRv2Mq8Ld', 'upsell3Dummy')->name('upsell3');

    // Upsell1 download pages for each sign
    Route::get('/wdl-Q8mX2pRv7Ka9Ln', 'downloadUpsell1')->defaults('sign', 'aries')->name('download.upsell1.aries');
    Route::get('/wdl-M4qLp8Nx2Ra7Kv', 'downloadUpsell1')->defaults('sign', 'taurus')->name('download.upsell1.taurus');
    Route::get('/wdl-Z7pQx3Lm9Rv2Ka', 'downloadUpsell1')->defaults('sign', 'gemini')->name('download.upsell1.gemini');
    Route::get('/wdl-H2vNx8Qa4Lp7Rm', 'downloadUpsell1')->defaults('sign', 'cancer')->name('download.upsell1.cancer');
    Route::get('/wdl-X9mRv2Lp7Ka3Qn', 'downloadUpsell1')->defaults('sign', 'leo')->name('download.upsell1.leo');
    Route::get('/wdl-P5qNx7Lm1Rv8Ka', 'downloadUpsell1')->defaults('sign', 'virgo')->name('download.upsell1.virgo');
    Route::get('/wdl-T8xQa2Lp9Rm4Kv', 'downloadUpsell1')->defaults('sign', 'libra')->name('download.upsell1.libra');
    Route::get('/wdl-R3mLp7Nx8Qa2Kv', 'downloadUpsell1')->defaults('sign', 'scorpio')->name('download.upsell1.scorpio');
    Route::get('/wdl-N6qRv1Lp8Ka4Xm', 'downloadUpsell1')->defaults('sign', 'sagittarius')->name('download.upsell1.sagittarius');
    Route::get('/wdl-Y2xLm9Qa7Rv3Kp', 'downloadUpsell1')->defaults('sign', 'capricorn')->name('download.upsell1.capricorn');
    Route::get('/wdl-L7pNx4Rv8Qa2Km', 'downloadUpsell1')->defaults('sign', 'aquarius')->name('download.upsell1.aquarius');
    Route::get('/wdl-K9mQa3Lp7Rv1Xn', 'downloadUpsell1')->defaults('sign', 'pisces')->name('download.upsell1.pisces');


    // Upsell2 download pages for each sign
    Route::get('/ldl-F8qXp2Rv7Lm4Ka', 'downloadUpsell2')->defaults('sign', 'aries')->name('download.upsell2.aries');
    Route::get('/ldl-C3mLp9Qa2Rv8Nx', 'downloadUpsell2')->defaults('sign', 'taurus')->name('download.upsell2.taurus');
    Route::get('/ldl-B7xQa4Lm9Rv2Kp', 'downloadUpsell2')->defaults('sign', 'gemini')->name('download.upsell2.gemini');
    Route::get('/ldl-D2vNx8Lp3Qa7Rm', 'downloadUpsell2')->defaults('sign', 'cancer')->name('download.upsell2.cancer');
    Route::get('/ldl-J9mRv1Qa7Lp4Xk', 'downloadUpsell2')->defaults('sign', 'leo')->name('download.upsell2.leo');
    Route::get('/ldl-U5qNx7Lm2Rv8Ka', 'downloadUpsell2')->defaults('sign', 'virgo')->name('download.upsell2.virgo');
    Route::get('/ldl-W8xQa3Lp9Rm2Kv', 'downloadUpsell2')->defaults('sign', 'libra')->name('download.upsell2.libra');
    Route::get('/ldl-S4mLp7Nx8Qa1Rv', 'downloadUpsell2')->defaults('sign', 'scorpio')->name('download.upsell2.scorpio');
    Route::get('/ldl-E6qRv2Lp8Ka4Xm', 'downloadUpsell2')->defaults('sign', 'sagittarius')->name('download.upsell2.sagittarius');
    Route::get('/ldl-G2xLm9Qa7Rv5Kp', 'downloadUpsell2')->defaults('sign', 'capricorn')->name('download.upsell2.capricorn');
    Route::get('/ldl-I7pNx4Rv8Qa3Km', 'downloadUpsell2')->defaults('sign', 'aquarius')->name('download.upsell2.aquarius');
    Route::get('/ldl-O9mQa2Lp7Rv1Xn', 'downloadUpsell2')->defaults('sign', 'pisces')->name('download.upsell2.pisces');

    // Upsell3 download page
    Route::get('/edl-V8qXp3Lm7Rv2Ka', 'downloadUpsell3')->name('download.upsell3');
});
