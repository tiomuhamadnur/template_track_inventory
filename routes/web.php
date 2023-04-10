<?php

use App\Http\Controllers\AccelerometerController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BufferController;
use App\Http\Controllers\BufferExaminationController;
use App\Http\Controllers\ColorSchemeController;
use App\Http\Controllers\DarkModeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DefectController;
use App\Http\Controllers\DepoDashboardController;
use App\Http\Controllers\DepoLineController;
use App\Http\Controllers\DetailPartController;
use App\Http\Controllers\JointController;
use App\Http\Controllers\LengkungController;
use App\Http\Controllers\LineController;
use App\Http\Controllers\MainlineController;
use App\Http\Controllers\MasterdataDashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\PICController;
use App\Http\Controllers\PMController;
use App\Http\Controllers\TemuanController;
use App\Http\Controllers\TemuanDepoController;
use App\Http\Controllers\TemuanMainlineController;
use App\Http\Controllers\TransDefectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WeselController;
use App\Http\Controllers\WeselExaminationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('dark-mode-switcher', [DarkModeController::class, 'switch'])->name('dark-mode-switcher');
Route::get('color-scheme-switcher/{color_scheme}', [ColorSchemeController::class, 'switch'])->name('color-scheme-switcher');

Route::controller(AuthController::class)->middleware('loggedin')->group(function () {
    Route::get('login', 'loginView')->name('login.index');
    Route::post('login', 'login')->name('login.check');
});

// Route::middleware('auth')->group(function () {
//     Route::get('logout', [AuthController::class, 'logout'])->name('logout');
//     Route::controller(PageController::class)->group(function () {
//         Route::get('dashboardOverview-1-page', 'dashboardOverview1')->name('dashboard-overview-1');
//         Route::get('dashboard-overview-2-page', 'dashboardOverview2')->name('dashboard-overview-2');
//         Route::get('dashboard-overview-3-page', 'dashboardOverview3')->name('dashboard-overview-3');
//         Route::get('dashboard-overview-4-page', 'dashboardOverview4')->name('dashboard-overview-4');
//         Route::get('categories-page', 'categories')->name('categories');
//         Route::get('add-product-page', 'addProduct')->name('add-product');
//         Route::get('product-list-page', 'productList')->name('product-list');
//         Route::get('product-grid-page', 'productGrid')->name('product-grid');
//         Route::get('transaction-list-page', 'transactionList')->name('transaction-list');
//         Route::get('transaction-detail-page', 'transactionDetail')->name('transaction-detail');
//         Route::get('seller-list-page', 'sellerList')->name('seller-list');
//         Route::get('seller-detail-page', 'sellerDetail')->name('seller-detail');
//         Route::get('reviews-page', 'reviews')->name('reviews');
//         Route::get('inbox-page', 'inbox')->name('inbox');
//         Route::get('file-manager-page', 'fileManager')->name('file-manager');
//         Route::get('point-of-sale-page', 'pointOfSale')->name('point-of-sale');
//         Route::get('chat-page', 'chat')->name('chat');
//         Route::get('post-page', 'post')->name('post');
//         Route::get('calendar-page', 'calendar')->name('calendar');
//         Route::get('crud-data-list-page', 'crudDataList')->name('crud-data-list');
//         Route::get('crud-form-page', 'crudForm')->name('crud-form');
//         Route::get('users-layout-1-page', 'usersLayout1')->name('users-layout-1');
//         Route::get('users-layout-2-page', 'usersLayout2')->name('users-layout-2');
//         Route::get('users-layout-3-page', 'usersLayout3')->name('users-layout-3');
//         Route::get('profile-overview-1-page', 'profileOverview1')->name('profile-overview-1');
//         Route::get('profile-overview-2-page', 'profileOverview2')->name('profile-overview-2');
//         Route::get('profile-overview-3-page', 'profileOverview3')->name('profile-overview-3');
//         Route::get('wizard-layout-1-page', 'wizardLayout1')->name('wizard-layout-1');
//         Route::get('wizard-layout-2-page', 'wizardLayout2')->name('wizard-layout-2');
//         Route::get('wizard-layout-3-page', 'wizardLayout3')->name('wizard-layout-3');
//         Route::get('blog-layout-1-page', 'blogLayout1')->name('blog-layout-1');
//         Route::get('blog-layout-2-page', 'blogLayout2')->name('blog-layout-2');
//         Route::get('blog-layout-3-page', 'blogLayout3')->name('blog-layout-3');
//         Route::get('pricing-layout-1-page', 'pricingLayout1')->name('pricing-layout-1');
//         Route::get('pricing-layout-2-page', 'pricingLayout2')->name('pricing-layout-2');
//         Route::get('invoice-layout-1-page', 'invoiceLayout1')->name('invoice-layout-1');
//         Route::get('invoice-layout-2-page', 'invoiceLayout2')->name('invoice-layout-2');
//         Route::get('faq-layout-1-page', 'faqLayout1')->name('faq-layout-1');
//         Route::get('faq-layout-2-page', 'faqLayout2')->name('faq-layout-2');
//         Route::get('faq-layout-3-page', 'faqLayout3')->name('faq-layout-3');
//         Route::get('login-page', 'login')->name('login');
//         Route::get('register-page', 'register')->name('register');
//         Route::get('error-page-page', 'errorPage')->name('error-page');
//         Route::get('update-profile-page', 'updateProfile')->name('update-profile');
//         Route::get('change-password-page', 'changePassword')->name('change-password');
//         Route::get('regular-table-page', 'regularTable')->name('regular-table');
//         Route::get('tabulator-page', 'tabulator')->name('tabulator');
//         Route::get('modal-page', 'modal')->name('modal');
//         Route::get('slide-over-page', 'slideOver')->name('slide-over');
//         Route::get('notification-page', 'notification')->name('notification');
//         Route::get('tab-page', 'tab')->name('tab');
//         Route::get('accordion-page', 'accordion')->name('accordion');
//         Route::get('button-page', 'button')->name('button');
//         Route::get('alert-page', 'alert')->name('alert');
//         Route::get('progress-bar-page', 'progressBar')->name('progress-bar');
//         Route::get('tooltip-page', 'tooltip')->name('tooltip');
//         Route::get('dropdown-page', 'dropdown')->name('dropdown');
//         Route::get('typography-page', 'typography')->name('typography');
//         Route::get('icon-page', 'icon')->name('icon');
//         Route::get('loading-icon-page', 'loadingIcon')->name('loading-icon');
//         Route::get('regular-form-page', 'regularForm')->name('regular-form');
//         Route::get('datepicker-page', 'datepicker')->name('datepicker');
//         Route::get('tom-select-page', 'tomSelect')->name('tom-select');
//         Route::get('file-upload-page', 'fileUpload')->name('file-upload');
//         Route::get('wysiwyg-editor-classic', 'wysiwygEditorClassic')->name('wysiwyg-editor-classic');
//         Route::get('wysiwyg-editor-inline', 'wysiwygEditorInline')->name('wysiwyg-editor-inline');
//         Route::get('wysiwyg-editor-balloon', 'wysiwygEditorBalloon')->name('wysiwyg-editor-balloon');
//         Route::get('wysiwyg-editor-balloon-block', 'wysiwygEditorBalloonBlock')->name('wysiwyg-editor-balloon-block');
//         Route::get('wysiwyg-editor-document', 'wysiwygEditorDocument')->name('wysiwyg-editor-document');
//         Route::get('validation-page', 'validation')->name('validation');
//         Route::get('chart-page', 'chart')->name('chart');
//         Route::get('slider-page', 'slider')->name('slider');
//         Route::get('image-zoom-page', 'imageZoom')->name('image-zoom');
//     });
// });

Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('transisi', [AuthController::class, 'transisi'])->name('transisi')->middleware('isUser');
    Route::get('transisi-user', [AuthController::class, 'transisi_user'])->name('transisi.user');
    Route::get('/', [AuthController::class, 'index']);

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/home', 'home');
        Route::get('/mainline/dashboard', 'index')->name('home');
    });

    Route::controller(DepoDashboardController::class)->group(function () {
        Route::get('/depo/dashboard', 'index')->name('depo.index');
    });

    Route::controller(PICController::class)->group(function () {
        Route::get('/pic', 'index')->name('pic.index');
        Route::get('/pic-create', 'create')->name('pic.create');
        Route::post('/pic', 'store')->name('pic.store');
        Route::get('/pic/{id}/edit', 'edit')->name('pic.edit');
        Route::put('/pic', 'pic_update')->name('pic.update');

        Route::get('/profile', 'profile')->name('profile');
        Route::get('/profile-update', 'update')->name('profile.update');
        Route::put('/profile-update', 'update_photo')->name('profile.update.photo');
        Route::put('/profile-update-ttd', 'update_ttd')->name('profile.update.ttd');
        Route::put('/profile-update/password', 'update_password')->name('profile.update.password');
        Route::put('/profile-update/pic', 'update_progress_pic')->name('profile.update.progress.pic');
    });

    Route::controller(TemuanController::class)->group(function () {
        Route::get('/temuan', 'index')->name('temuan.index');
        Route::get('/temuan-create', 'create')->name('temuan.create');
        Route::post('/temuan', 'store')->name('temuan.store');
        Route::get('/temuan/{id}/edit', 'edit')->name('temuan.edit');
        Route::put('/temuan', 'update')->name('temuan.update');
        Route::delete('/temuan', 'destroy')->name('temuan.delete');
        Route::get('/temuan/export', 'export')->name('temuan.export');
    });

    Route::controller(TemuanMainlineController::class)->group(function () {
        Route::get('/temuan_mainline', 'index')->name('temuan_mainline.index');
        Route::get('/temuan_mainline-create', 'create')->name('temuan_mainline.create');
        Route::post('/temuan_mainline', 'store')->name('temuan_mainline.store');
        Route::get('/temuan_mainline/{id}/edit', 'edit')->name('temuan_mainline.edit');
        Route::put('/temuan_mainline', 'update')->name('temuan_mainline.update');
        Route::delete('/temuan_mainline', 'destroy')->name('temuan_mainline.delete');
        Route::get('/temuan_mainline/{id}/close_temuan', 'close_temuan')->name('temuan_mainline.close.temuan');
        Route::put('/temuan_mainline/close_temuan', 'store_temuan')->name('temuan_mainline.store.temuan');
        Route::get('/temuan/export_mainline', 'export')->name('temuan_mainline.export');
        Route::get('/temuan/export_mainline_pdf', 'export_pdf')->name('temuan_mainline.export.pdf');

        // GET DATA
        Route::get('/getLocation', 'getLocation')->name('getLocation');
        Route::get('/getLine', 'getLine')->name('getLine');
        Route::get('/getSpan', 'getSpan')->name('getSpan');
        Route::get('/getDetailPart', 'getDetailPart')->name('getDetailPart');
        Route::get('/getDefect', 'getDefect')->name('getDefect');
        Route::get('/getAvatar', 'getAvatar')->name('getAvatar');

        // FILTER DATA
        Route::get('/temuan-mainline/filter', 'filter')->name('temuan_mainline.filter');

        // REPORT GENERATOR
        Route::get('/temuan-mainline/report', 'report')->name('temuan_mainline.report');
    });

    Route::controller(TemuanDepoController::class)->group(function () {
        Route::get('/temuan_depo', 'index')->name('temuan_depo.index');
        Route::get('/temuan_depo-create', 'create')->name('temuan_depo.create');
        Route::post('/temuan_depo', 'store')->name('temuan_depo.store');
        Route::get('/temuan_depo/{id}/edit', 'edit')->name('temuan_depo.edit');
        Route::put('/temuan_depo', 'update')->name('temuan_depo.update');
        Route::delete('/temuan_depo', 'destroy')->name('temuan_depo.delete');
        Route::get('/temuan_depo/{id}/close_temuan', 'close_temuan')->name('temuan_depo.close.temuan');
        Route::put('/temuan_depo/close_temuan', 'store_temuan')->name('temuan_depo.store.temuan');
        Route::get('/depo/export_mainline', 'export')->name('temuan_depo.export');
        Route::get('/depo/export_mainline_pdf', 'export_pdf')->name('temuan_depo.export.pdf');

        // FILTER DATA
        Route::get('/temuan-depo/filter', 'filter')->name('temuan_depo.filter');

        // REPORT GENERATOR
        Route::get('/temuan-depo/report', 'report')->name('temuan_depo.report');
    });

    // ACCELEROMETER
    Route::controller(AccelerometerController::class)->group(function () {
        Route::get('/accelerometer', 'index')->name('accelerometer.index');
        Route::get('/summary/{id}/accelerometer', 'index_summary')->name('accelerometer.summary.index');
        Route::get('/accelerometer-create', 'create')->name('accelerometer.create');
        Route::post('/accelerometer', 'store')->name('accelerometer.store');
        Route::get('/accelerometer/{id}/edit', 'edit')->name('accelerometer.edit');
        Route::put('/accelerometer', 'update')->name('accelerometer.update');
        Route::delete('/accelerometer', 'destroy')->name('accelerometer.delete');

        // REPORT
        Route::get('/accelerometer/report', 'report')->name('accelerometer.report');

        // JADWAL ACCELEROMETER
        Route::get('/accelerometer/jadwal', 'index_jadwal')->name('accelerometer.jadwal.index');
        Route::get('/accelerometer-create/jadwal', 'create_jadwal')->name('accelerometer.jadwal.create');
        Route::post('/accelerometer/jadwal', 'store_jadwal')->name('accelerometer.jadwal.store');
        Route::get('/accelerometer/{id}/edit/jadwal', 'edit_jadwal')->name('accelerometer.jadwal.edit');
        Route::put('/accelerometer/jadwal', 'update_jadwal')->name('accelerometer.jadwal.update');
        Route::delete('/accelerometer/jadwal', 'destroy_jadwal')->name('accelerometer.jadwal.delete');

        // GET VALUE
        Route::get('/getValueAccelerometer', 'getValue')->name('accelerometer.getValue');
        Route::get('/getPICAccelerometer', 'getPIC')->name('accelerometer.getPIC');
    });

    // WESEL EXAMINATION
    Route::controller(WeselExaminationController::class)->group(function () {
        Route::get('/wesel-examination', 'index')->name('wesel.examination.index');
        Route::get('/wesel-examination-create', 'create')->name('wesel.examination.create');
        Route::get('/wesel-examination/{id}/history', 'history')->name('wesel.examination.history');
        Route::post('/wesel-examination', 'store')->name('wesel.examination.store');
        Route::get('/wesel-examination/{id}/edit', 'edit')->name('wesel.examination.edit');
        Route::get('/wesel-examination/filter', 'filter')->name('wesel.examination.filter');
        Route::get('/wesel-examination-export', 'export')->name('wesel.examination.export');
        Route::put('/wesel-examination', 'update')->name('wesel.examination.update');
        Route::delete('/wesel-examination', 'destroy')->name('wesel.examination.delete');

        // REPORT
        Route::get('/wesel-examination-report', 'report')->name('wesel.examination.report');
    });

    // BUFFER/WHEEL STOP EXAMINATION
    Route::controller(BufferExaminationController::class)->group(function () {
        Route::get('/buffer-examination', 'index')->name('buffer.examination.index');
        Route::get('/buffer-examination-create', 'create')->name('buffer.examination.create');
        Route::post('/buffer-examination', 'store')->name('buffer.examination.store');
        Route::get('/buffer-examination/{id}/edit', 'edit')->name('buffer.examination.edit');
        Route::put('/buffer-examination', 'update')->name('buffer.examination.update');
        Route::delete('/buffer-examination', 'destroy')->name('buffer.examination.delete');

        // REPORT
        Route::get('/buffer-examination-report', 'report')->name('buffer.examination.report');
    });

    Route::middleware('isAdmin')->group(function () {
        // MAINLINE
        Route::controller(MasterdataDashboardController::class)->group(function () {
            Route::get('/master-data/dashboard', 'index')->name('masterdata.index');
        });

        Route::controller(UserController::class)->group(function () {
            Route::get('/usermanage', 'index')->name('usermanage.index');
            Route::get('/usermanage-create', 'create')->name('usermanage.create');
            Route::post('/usermanage', 'store')->name('usermanage.store');
            Route::get('/usermanage/{id}/update', 'edit')->name('usermanage.edit');
            Route::put('/usermanage', 'update')->name('usermanage.update');
            Route::put('/usermanage/reset-password', 'reset_password')->name('reset.password');
        });

        Route::controller(AreaController::class)->group(function () {
            Route::get('/area', 'index')->name('area.index');
            Route::get('/area-create', 'create')->name('area.create');
            Route::post('/area', 'store')->name('area.store');
            Route::get('/area/{id}/edit', 'edit')->name('area.edit');
            Route::put('/area', 'update')->name('area.update');
            Route::get('/area/{id}/delete', 'destroy')->name('area.delete');
        });

        Route::controller(LineController::class)->group(function () {
            Route::get('/line', 'index')->name('line.index');
            Route::get('/line-create', 'create')->name('line.create');
            Route::post('/line', 'store')->name('line.store');
            Route::get('/line/{id}/edit', 'edit')->name('line.edit');
            Route::put('/line', 'update')->name('line.update');
            Route::get('/line/{id}/delete', 'destroy')->name('line.delete');
        });

        Route::controller(MainlineController::class)->group(function () {
            Route::get('/trackbed', 'index')->name('mainline.index');
            Route::get('/trackbed-create', 'create')->name('mainline.create');
            Route::post('/mainline', 'store')->name('mainline.store');
            Route::get('/mainline/{id}/edit', 'edit')->name('mainline.edit');
            Route::put('/mainline', 'update')->name('mainline.update');
            Route::get('/mainline/{id}/delete', 'destroy')->name('mainline.delete');

            // SPAN atau TRACK BED
            Route::post('/mainline/import', 'import')->name('mainline.import');
            Route::get('/mainline/export', 'export')->name('mainline.export');
            Route::get('/mainline/json', 'getJson')->name('mainline.json');
        });

        Route::controller(PartController::class)->group(function () {
            Route::get('/part', 'index')->name('part.index');
            Route::get('/part-create', 'create')->name('part.create');
            Route::post('/part', 'store')->name('part.store');
            Route::get('/part/{id}/edit', 'edit')->name('part.edit');
            Route::put('/part', 'update')->name('part.update');
            Route::delete('/part', 'destroy')->name('part.delete');
        });

        Route::controller(DetailPartController::class)->group(function () {
            Route::get('/detail-part', 'index')->name('detail-part.index');
            Route::get('/detail-part-create', 'create')->name('detail-part.create');
            Route::post('/detail-part', 'store')->name('detail-part.store');
            Route::get('/detail-part/{id}/edit', 'edit')->name('detail-part.edit');
            Route::put('/detail-part', 'update')->name('detail-part.update');
            Route::delete('/detail-part', 'destroy')->name('detail-part.delete');
        });

        Route::controller(DefectController::class)->group(function () {
            Route::get('/defect', 'index')->name('defect.index');
            Route::get('/defect-create', 'create')->name('defect.create');
            Route::post('/defect', 'store')->name('defect.store');
            Route::get('/defect/{id}/edit', 'edit')->name('defect.edit');
            Route::put('/defect', 'update')->name('defect.update');
            Route::delete('/defect', 'destroy')->name('defect.delete');
        });

        Route::controller(TransDefectController::class)->group(function () {
            Route::get('/TransDefect', 'index')->name('transDefect.index');
            Route::get('/TransDefect-create', 'create')->name('transDefect.create');
            Route::post('/TransDefect', 'store')->name('transDefect.store');
            Route::get('/TransDefect/{id}/edit', 'edit')->name('transDefect.edit');
            Route::put('/TransDefect', 'update')->name('transDefect.update');
            Route::delete('/TransDefect', 'destroy')->name('transDefect.delete');

            // Import Trans Part & Defect
            Route::post('/TransDefect/import', 'import')->name('transDefect.import');
        });

        Route::controller(WeselController::class)->group(function () {
            Route::get('/wesel', 'index')->name('wesel.index');
            Route::get('/wesel-create', 'create')->name('wesel.create');
            Route::post('/wesel', 'store')->name('wesel.store');
            Route::get('/wesel/{id}/edit', 'edit')->name('wesel.edit');
            Route::put('/wesel', 'update')->name('wesel.update');
            Route::delete('/wesel', 'destroy')->name('wesel.delete');
            Route::post('/wesel-import', 'import')->name('wesel.import');
        });

        Route::controller(JointController::class)->group(function () {
            Route::get('/joint', 'index')->name('joint.index');
            Route::get('/joint-create', 'create')->name('joint.create');
            Route::post('/joint', 'store')->name('joint.store');
            Route::get('/joint/{id}/edit', 'edit')->name('joint.edit');
            Route::put('/joint', 'update')->name('joint.update');
            Route::delete('/joint', 'destroy')->name('joint.delete');
        });

        Route::controller(PMController::class)->group(function () {
            Route::get('/pm', 'index')->name('pm.index');
            Route::get('/pm-create', 'create')->name('pm.create');
            Route::post('/pm', 'store')->name('pm.store');
            Route::get('/pm/{id}/edit', 'edit')->name('pm.edit');
            Route::put('/pm', 'update')->name('pm.update');
            Route::delete('/pm', 'destroy')->name('pm.delete');
        });

        Route::controller(BufferController::class)->group(function () {
            Route::get('/buffer', 'index')->name('buffer.index');
            Route::get('/buffer-create', 'create')->name('buffer.create');
            Route::post('/buffer', 'store')->name('buffer.store');
            Route::get('/buffer/{id}/edit', 'edit')->name('buffer.edit');
            Route::put('/buffer', 'update')->name('buffer.update');
            Route::delete('/buffer', 'destroy')->name('buffer.delete');
        });

        // DEPO
        Route::controller(DepoLineController::class)->group(function () {
            Route::get('/depoline', 'index')->name('depoline.index');
            Route::get('/depoline-create', 'create')->name('depoline.create');
            Route::post('/depoline', 'store')->name('depoline.store');
            Route::get('/depoline/{id}/edit', 'edit')->name('depoline.edit');
            Route::put('/depoline', 'update')->name('depoline.update');
            Route::delete('/depoline/{id}/delete', 'destroy')->name('depoline.delete');
        });

        Route::controller(LengkungController::class)->group(function () {
            Route::get('/lengkung', 'index')->name('lengkung.index');
            Route::get('/lengkung-create', 'create')->name('lengkung.create');
            Route::post('/lengkung', 'store')->name('lengkung.store');
            Route::get('/lengkung/{id}/edit', 'edit')->name('lengkung.edit');
            Route::get('/lengkung/{id}', 'filter')->name('lengkung.filter');
            Route::put('/lengkung', 'update')->name('lengkung.update');
            Route::delete('/lengkung', 'destroy')->name('lengkung.delete');
            Route::post('/lengkung-import', 'import')->name('lengkung.import');
        });
    });
});