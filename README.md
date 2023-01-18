<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<h2 dir="auto"><a id="user-content-installation" class="anchor" aria-hidden="true" href="#installation"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M7.775 3.275a.75.75 0 001.06 1.06l1.25-1.25a2 2 0 112.83 2.83l-2.5 2.5a2 2 0 01-2.83 0 .75.75 0 00-1.06 1.06 3.5 3.5 0 004.95 0l2.5-2.5a3.5 3.5 0 00-4.95-4.95l-1.25 1.25zm-4.69 9.64a2 2 0 010-2.83l2.5-2.5a2 2 0 012.83 0 .75.75 0 001.06-1.06 3.5 3.5 0 00-4.95 0l-2.5 2.5a3.5 3.5 0 004.95 4.95l1.25-1.25a.75.75 0 00-1.06-1.06l-1.25 1.25a2 2 0 01-2.83 0z"></path></svg></a>Installation</h2>
<div class="highlight highlight-source-shell notranslate position-relative overflow-auto" dir="auto" data-snippet-clipboard-copy-content="composer install"><pre>composer install</pre></div>
<div class="highlight highlight-source-shell notranslate position-relative overflow-auto" dir="auto" data-snippet-clipboard-copy-content="composer install"><pre>cp .env.example .env</pre></div>


<p dir="auto">Compléter le fichier .env :</p>
<div class="snippet-clipboard-content notranslate position-relative overflow-auto" data-snippet-clipboard-copy-content="DB_USERNAME=
DB_PASSWORD=><pre lang="text" class="notranslate"><code>DB_USERNAME=
DB_PASSWORD=
</code></pre></div>                                                


<h2 dir="auto"><a id="user-content-basic-usage" class="anchor" aria-hidden="true" href="#basic-usage"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M7.775 3.275a.75.75 0 001.06 1.06l1.25-1.25a2 2 0 112.83 2.83l-2.5 2.5a2 2 0 01-2.83 0 .75.75 0 00-1.06 1.06 3.5 3.5 0 004.95 0l2.5-2.5a3.5 3.5 0 00-4.95-4.95l-1.25 1.25zm-4.69 9.64a2 2 0 010-2.83l2.5-2.5a2 2 0 012.83 0 .75.75 0 001.06-1.06 3.5 3.5 0 00-4.95 0l-2.5 2.5a3.5 3.5 0 004.95 4.95l1.25-1.25a.75.75 0 00-1.06-1.06l-1.25 1.25a2 2 0 01-2.83 0z"></path></svg></a>Blueprint</h2>
<h3 dir="auto"><a id="user-content-autoloading" class="anchor" aria-hidden="true" href="#autoloading"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M7.775 3.275a.75.75 0 001.06 1.06l1.25-1.25a2 2 0 112.83 2.83l-2.5 2.5a2 2 0 01-2.83 0 .75.75 0 00-1.06 1.06 3.5 3.5 0 004.95 0l2.5-2.5a3.5 3.5 0 00-4.95-4.95l-1.25 1.25zm-4.69 9.64a2 2 0 010-2.83l2.5-2.5a2 2 0 012.83 0 .75.75 0 001.06-1.06 3.5 3.5 0 00-4.95 0l-2.5 2.5a3.5 3.5 0 004.95 4.95l1.25-1.25a.75.75 0 00-1.06-1.06l-1.25 1.25a2 2 0 01-2.83 0z"></path></svg></a>Installation</h3>
<div class="highlight highlight-source-shell notranslate position-relative overflow-auto" dir="auto" data-snippet-clipboard-copy-content="composer install"><pre>composer require --dev laravel-shift/blueprint</pre></div>
<p dir="auto">Normalement, il y a un fichier <code>draft.yaml</code>qui permet de générer l'ensemble des composents.</p>
<p dir="auto">Pas besoin de lancez la commande : <code>php artisan blueprint:build</code> c'est pour expliquer comment cela fonctionne par contre faites un : <code>php artisan migrate</code>.</p>
<p dir="auto">Pour seeder l'application, le ficher <code>seeders.php</code> dans le dossier <code>config</code>est nécessaire et ensuite effectuez la commande :</p>
<p dir="auto">Normalement l'ensemble des seeders est compléter comme cette exemple ci dessous (ici pour les adresses par exemple)</p>
             
 <div class="highlight highlight-text-html-php notranslate position-relative overflow-auto" dir="auto" data-snippet-clipboard-copy-content="public function run() 
{
    foreach(config('seeders.addresses') as $address) {
        Address::create($address);
    }
}"><pre><span class="pl-k">public function run() {
    </span>foreach(config(<span class="pl-s">'seeders.addresses'</span>) as $address) {
        <span class="pl-s1"><span class="pl-c1">Address::create($address);</span>
    }
}</pre></div>            

<p dir="auto">Ensuite, effectuez les commande suivante :</p>
   <div class="highlight highlight-source-shell notranslate position-relative overflow-auto" dir="auto" data-snippet-clipboard-copy-content="composer install"><pre>composer require laravel/passport</pre></div>
    <div class="highlight highlight-source-shell notranslate position-relative overflow-auto" dir="auto" data-snippet-clipboard-copy-content="composer install"><pre>php artisan passport:install</pre></div>
   <div class="highlight highlight-source-shell notranslate position-relative overflow-auto" dir="auto" data-snippet-clipboard-copy-content="composer install"><pre>php artisan migrate:fresh --seed</pre></div>
   
<h2 dir="auto"><a id="user-content-basic-usage" class="anchor" aria-hidden="true" href="#basic-usage"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M7.775 3.275a.75.75 0 001.06 1.06l1.25-1.25a2 2 0 112.83 2.83l-2.5 2.5a2 2 0 01-2.83 0 .75.75 0 00-1.06 1.06 3.5 3.5 0 004.95 0l2.5-2.5a3.5 3.5 0 00-4.95-4.95l-1.25 1.25zm-4.69 9.64a2 2 0 010-2.83l2.5-2.5a2 2 0 012.83 0 .75.75 0 001.06-1.06 3.5 3.5 0 00-4.95 0l-2.5 2.5a3.5 3.5 0 004.95 4.95l1.25-1.25a.75.75 0 00-1.06-1.06l-1.25 1.25a2 2 0 01-2.83 0z"></path></svg></a>Filament</h2>

<p>Il faut créer un Admin Filament pour accéder au backoffice, il va créer un user qui aura accès au côté Admin</p>
<div class="highlight highlight-source-shell notranslate position-relative overflow-auto" dir="auto" data-snippet-clipboard-copy-content="composer require filament/filament:"^2.0""><pre>composer require filament/filament:"^2.0"</pre></div>
<div class="highlight highlight-source-shell notranslate position-relative overflow-auto" dir="auto" data-snippet-clipboard-copy-content="php artisan make:filament-user"><pre>php artisan make:filament-user</pre></div>

   
   
   <h2 dir="auto"><a id="user-content-basic-usage" class="anchor" aria-hidden="true" href="#basic-usage"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M7.775 3.275a.75.75 0 001.06 1.06l1.25-1.25a2 2 0 112.83 2.83l-2.5 2.5a2 2 0 01-2.83 0 .75.75 0 00-1.06 1.06 3.5 3.5 0 004.95 0l2.5-2.5a3.5 3.5 0 00-4.95-4.95l-1.25 1.25zm-4.69 9.64a2 2 0 010-2.83l2.5-2.5a2 2 0 012.83 0 .75.75 0 001.06-1.06 3.5 3.5 0 00-4.95 0l-2.5 2.5a3.5 3.5 0 004.95 4.95l1.25-1.25a.75.75 0 00-1.06-1.06l-1.25 1.25a2 2 0 01-2.83 0z"></path></svg></a>API</h2>
   <h3 dir="auto"><a id="user-content-autoloading" class="anchor" aria-hidden="true" href="#autoloading"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M7.775 3.275a.75.75 0 001.06 1.06l1.25-1.25a2 2 0 112.83 2.83l-2.5 2.5a2 2 0 01-2.83 0 .75.75 0 00-1.06 1.06 3.5 3.5 0 004.95 0l2.5-2.5a3.5 3.5 0 00-4.95-4.95l-1.25 1.25zm-4.69 9.64a2 2 0 010-2.83l2.5-2.5a2 2 0 012.83 0 .75.75 0 001.06-1.06 3.5 3.5 0 00-4.95 0l-2.5 2.5a3.5 3.5 0 004.95 4.95l1.25-1.25a.75.75 0 00-1.06-1.06l-1.25 1.25a2 2 0 01-2.83 0z"></path></svg></a>Rôles</h3>
   
   <div class="highlight highlight-source-json notranslate position-relative overflow-auto" dir="auto" data-snippet-clipboard-copy-content="[
    {
        &quot;username&quot;: &quot;user&quot;,
        &quot;email&quot;: &quot;user@exemple.com&quot;,
        &quot;password&quot;: &quot;useruser&quot;
    },
    {
        &quot;username&quot;: &quot;admin&quot;,
        &quot;email&quot;: &quot;admin@admin.com&quot;,
        &quot;password&quot;: &quot;admin&quot;
    },
    {
        &quot;username&quot;: &quot;superadmin&quot;,
        &quot;email&quot;: &quot;superadmin@admin.com&quot;,
        &quot;password&quot;: &quot;superadmin&quot;
    }
]"><pre>[
    {
        <span class="pl-ent">"username"</span>: <span class="pl-s"><span class="pl-pds">"</span>user<span class="pl-pds">"</span></span>,
        <span class="pl-ent">"email"</span>: <span class="pl-s"><span class="pl-pds">"</span>user@exemple.com<span class="pl-pds">"</span></span>,
        <span class="pl-ent">"password"</span>: <span class="pl-s"><span class="pl-pds">"</span>useruser<span class="pl-pds">"</span></span>
    },
    {
        <span class="pl-ent">"username"</span>: <span class="pl-s"><span class="pl-pds">"</span>admin<span class="pl-pds">"</span></span>,
        <span class="pl-ent">"email"</span>: <span class="pl-s"><span class="pl-pds">"</span>admin@admin.com<span class="pl-pds">"</span></span>,
        <span class="pl-ent">"password"</span>: <span class="pl-s"><span class="pl-pds">"</span>admin<span class="pl-pds">"</span></span>
    },
    {
        <span class="pl-ent">"username"</span>: <span class="pl-s"><span class="pl-pds">"</span>superadmin<span class="pl-pds">"</span></span>,
        <span class="pl-ent">"email"</span>: <span class="pl-s"><span class="pl-pds">"</span>superadmin@admin.com<span class="pl-pds">"</span></span>,
        <span class="pl-ent">"password"</span>: <span class="pl-s"><span class="pl-pds">"</span>superadmin<span class="pl-pds">"</span></span>
    }
]</pre></div>

<h3 dir="auto"><a id="permissions" class="anchor" aria-hidden="true" href="#permissions"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M7.775 3.275a.75.75 0 001.06 1.06l1.25-1.25a2 2 0 112.83 2.83l-2.5 2.5a2 2 0 01-2.83 0 .75.75 0 00-1.06 1.06 3.5 3.5 0 004.95 0l2.5-2.5a3.5 3.5 0 00-4.95-4.95l-1.25 1.25zm-4.69 9.64a2 2 0 010-2.83l2.5-2.5a2 2 0 012.83 0 .75.75 0 001.06-1.06 3.5 3.5 0 00-4.95 0l-2.5 2.5a3.5 3.5 0 004.95 4.95l1.25-1.25a.75.75 0 00-1.06-1.06l-1.25 1.25a2 2 0 01-2.83 0z"></path></svg></a>Permissions</h3>
<table>
<thead>
<tr>
<th align="center">email</th>
<th align="center">roles</th>
<th align="center">permissions</th>
</tr>
</thead>
<tbody>
<tr>
<td align="center"><a href="mailto:user@exemple.com">user@exemple.com</a></td>
<td align="center">user</td>
<td align="center">index, show</td>
</tr>
<tr>
<td align="center"><a href="mailto:admin@admin.com">admin@admin.com</a></td>
<td align="center">user, admin</td>
<td align="center">index, show, update</td>
</tr>
<tr>
<td align="center"><a href="mailto:superadmin@admin.com">superadmin@admin.com</a></td>
<td align="center">user, admin, superadmin</td>
<td align="center">index, show, update, destroy</td>
</tr>
</tbody>
</table>

<h3 dir="auto"><a id="user-content-autoloading" class="anchor" aria-hidden="true" href="#autoloading"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M7.775 3.275a.75.75 0 001.06 1.06l1.25-1.25a2 2 0 112.83 2.83l-2.5 2.5a2 2 0 01-2.83 0 .75.75 0 00-1.06 1.06 3.5 3.5 0 004.95 0l2.5-2.5a3.5 3.5 0 00-4.95-4.95l-1.25 1.25zm-4.69 9.64a2 2 0 010-2.83l2.5-2.5a2 2 0 012.83 0 .75.75 0 001.06-1.06 3.5 3.5 0 00-4.95 0l-2.5 2.5a3.5 3.5 0 004.95 4.95l1.25-1.25a.75.75 0 00-1.06-1.06l-1.25 1.25a2 2 0 01-2.83 0z"></path></svg></a>Accès API</h3>

<p dir="auto">Sur Postman, faite un GET sur l'url <code>{host}/api/v1/login</code> Récupérer un bearer token et testez les requêtes sur l'ensemble des composents.</p>


<h2 dir="auto"><a id="user-content-basic-usage" class="anchor" aria-hidden="true" href="#basic-usage"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M7.775 3.275a.75.75 0 001.06 1.06l1.25-1.25a2 2 0 112.83 2.83l-2.5 2.5a2 2 0 01-2.83 0 .75.75 0 00-1.06 1.06 3.5 3.5 0 004.95 0l2.5-2.5a3.5 3.5 0 00-4.95-4.95l-1.25 1.25zm-4.69 9.64a2 2 0 010-2.83l2.5-2.5a2 2 0 012.83 0 .75.75 0 001.06-1.06 3.5 3.5 0 00-4.95 0l-2.5 2.5a3.5 3.5 0 004.95 4.95l1.25-1.25a.75.75 0 00-1.06-1.06l-1.25 1.25a2 2 0 01-2.83 0z"></path></svg></a>Routes côté BackOffice</h2>

<div class="highlight highlight-source-shell notranslate position-relative overflow-auto" dir="auto" data-snippet-clipboard-copy-content="Route::get('/admin')"><pre>Route::get('/admin')</pre></div>

<h2 dir="auto"><a id="user-content-basic-usage" class="anchor" aria-hidden="true" href="#basic-usage"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M7.775 3.275a.75.75 0 001.06 1.06l1.25-1.25a2 2 0 112.83 2.83l-2.5 2.5a2 2 0 01-2.83 0 .75.75 0 00-1.06 1.06 3.5 3.5 0 004.95 0l2.5-2.5a3.5 3.5 0 00-4.95-4.95l-1.25 1.25zm-4.69 9.64a2 2 0 010-2.83l2.5-2.5a2 2 0 012.83 0 .75.75 0 001.06-1.06 3.5 3.5 0 00-4.95 0l-2.5 2.5a3.5 3.5 0 004.95 4.95l1.25-1.25a.75.75 0 00-1.06-1.06l-1.25 1.25a2 2 0 01-2.83 0z"></path></svg></a>Routes côté API</h2>

<p>Pour se connecter sous Postman</p>
<div class="highlight highlight-source-shell notranslate position-relative overflow-auto" dir="auto" data-snippet-clipboard-copy-content="Route::group(['prefix' => 'v1'], function (){
    Route::post('register', [\App\Http\Controllers\Api\RegisterController::class, 'register'])->name('register');
    Route::post('login', [\App\Http\Controllers\Api\RegisterController::class, 'login'])->name('login');   
});"><pre>Route::group(['prefix' => 'v1'], function (){
    Route::post('register', [\App\Http\Controllers\Api\RegisterController::class, 'register'])->name('register');
    Route::post('login', [\App\Http\Controllers\Api\RegisterController::class, 'login'])->name('login');   
});</pre></div>

<p>Méthode CRUD dans l'ensemble de mes modèles</p>
<div class="highlight highlight-source-shell notranslate position-relative overflow-auto" dir="auto" data-snippet-clipboard-copy-content="Route::apiResource('bedrooms', App\Http\Controllers\Api\BedroomController::class);
    Route::apiResource('bedroom-types', App\Http\Controllers\Api\BedroomTypeController::class);
    Route::apiResource('benefits', App\Http\Controllers\Api\BenefitController::class);
    Route::apiResource('benefit-prices', App\Http\Controllers\Api\BenefitPriceController::class);
    Route::apiResource('bookings', App\Http\Controllers\Api\BookingController::class);
    Route::apiResource('hotels', App\Http\Controllers\Api\HotelController::class);
    Route::apiResource('hotel-class', App\Http\Controllers\Api\HotelClassController::class);
    Route::apiResource('payments', App\Http\Controllers\Api\PaymentController::class);
    Route::apiResource('payment-types', App\Http\Controllers\Api\PaymentTypeController::class);
    Route::apiResource('addresses', App\Http\Controllers\Api\AddressController::class);
    Route::apiResource('countries', App\Http\Controllers\Api\CountryController::class);"><pre>Route::apiResource('bedrooms', App\Http\Controllers\Api\BedroomController::class);
    Route::apiResource('bedroom-types', App\Http\Controllers\Api\BedroomTypeController::class);
    Route::apiResource('benefits', App\Http\Controllers\Api\BenefitController::class);
    Route::apiResource('benefit-prices', App\Http\Controllers\Api\BenefitPriceController::class);
    Route::apiResource('bookings', App\Http\Controllers\Api\BookingController::class);
    Route::apiResource('hotels', App\Http\Controllers\Api\HotelController::class);
    Route::apiResource('hotel-class', App\Http\Controllers\Api\HotelClassController::class);
    Route::apiResource('payments', App\Http\Controllers\Api\PaymentController::class);
    Route::apiResource('payment-types', App\Http\Controllers\Api\PaymentTypeController::class);
    Route::apiResource('addresses', App\Http\Controllers\Api\AddressController::class);
    Route::apiResource('countries', App\Http\Controllers\Api\CountryController::class);</pre></div>

<p>Route pour faire des recherches filtrées dans l'ensemble des modèles Hotel et Bedroom</p>
<div class="highlight highlight-source-shell notranslate position-relative overflow-auto" dir="auto" data-snippet-clipboard-copy-content="Route::get('hotels/search', [App\Http\Controllers\Api\HotelController::class, 'search']);
Route::get('bedrooms/search', [App\Http\Controllers\Api\BedroomController::class, 'search']);"><pre>
Route::get('hotels/search', [App\Http\Controllers\Api\HotelController::class, 'search']);
Route::get('bedrooms/search', [App\Http\Controllers\Api\BedroomController::class, 'search']);</pre></div>

<p>J'ai aussi une méthode qui permet de chercher une donnée en fonction de la colonne (name, description...) en fonction de ce que l'on souhaite cherchher (eq = '=', ne = '!=', (pour des données chiffrés : 'lt' = '<', 'lte' = '<=', 'gt' = '>', 'gte' = '>=') pour l'ensemble de mes modèles.
Petit exemple sous Postman : 
<div class="snippet-clipboard-content notranslate position-relative overflow-auto" data-snippet-clipboard-copy-content="http/.../v1/countries?name[eq]=France=><pre lang="text" class="notranslate"><code>http/.../v1/countries?name[eq]=France
</code></pre></div>  

