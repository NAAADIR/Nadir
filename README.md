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
<div class="highlight highlight-source-shell notranslate position-relative overflow-auto" dir="auto" data-snippet-clipboard-copy-content="composer install"><pre>composer require laravel/passport</pre></div>
<div class="highlight highlight-source-shell notranslate position-relative overflow-auto" dir="auto" data-snippet-clipboard-copy-content="composer install"><pre>php artisan passport:install</pre></div>

<div class="highlight highlight-text-html-php notranslate position-relative overflow-auto" dir="auto" data-snippet-clipboard-copy-content="if (env('APP_DEBUG')) {
 $app-&gt;register(Barryvdh\Debugbar\LumenServiceProvider::class);
}"><pre><span class="pl-k">if</span> (env(<span class="pl-s">'APP_DEBUG'</span>)) {
 <span class="pl-s1"><span class="pl-c1">$</span>app</span>-&gt;<span class="pl-en">register</span>(<span class="pl-v">Barryvdh</span>\<span class="pl-v">Debugbar</span>\<span class="pl-v">LumenServiceProvider</span>::class);
}</pre></div>


<p dir="auto">Compléter le fichier .env :</p>
<div class="snippet-clipboard-content notranslate position-relative overflow-auto" data-snippet-clipboard-copy-content="DB_USERNAME=
DB_PASSWORD=><pre lang="text" class="notranslate"><code>DB_USERNAME=
DB_PASSWORD=
</code></pre></div>                                                


<h2 dir="auto"><a id="user-content-basic-usage" class="anchor" aria-hidden="true" href="#basic-usage"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M7.775 3.275a.75.75 0 001.06 1.06l1.25-1.25a2 2 0 112.83 2.83l-2.5 2.5a2 2 0 01-2.83 0 .75.75 0 00-1.06 1.06 3.5 3.5 0 004.95 0l2.5-2.5a3.5 3.5 0 00-4.95-4.95l-1.25 1.25zm-4.69 9.64a2 2 0 010-2.83l2.5-2.5a2 2 0 012.83 0 .75.75 0 001.06-1.06 3.5 3.5 0 00-4.95 0l-2.5 2.5a3.5 3.5 0 004.95 4.95l1.25-1.25a.75.75 0 00-1.06-1.06l-1.25 1.25a2 2 0 01-2.83 0z"></path></svg></a>Blueprint</h2>
<h3 dir="auto"><a id="user-content-autoloading" class="anchor" aria-hidden="true" href="#autoloading"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M7.775 3.275a.75.75 0 001.06 1.06l1.25-1.25a2 2 0 112.83 2.83l-2.5 2.5a2 2 0 01-2.83 0 .75.75 0 00-1.06 1.06 3.5 3.5 0 004.95 0l2.5-2.5a3.5 3.5 0 00-4.95-4.95l-1.25 1.25zm-4.69 9.64a2 2 0 010-2.83l2.5-2.5a2 2 0 012.83 0 .75.75 0 001.06-1.06 3.5 3.5 0 00-4.95 0l-2.5 2.5a3.5 3.5 0 004.95 4.95l1.25-1.25a.75.75 0 00-1.06-1.06l-1.25 1.25a2 2 0 01-2.83 0z"></path></svg></a>Installation</h3>
<div class="highlight highlight-source-shell notranslate position-relative overflow-auto" dir="auto" data-snippet-clipboard-copy-content="composer install"><pre>composer require --dev laravel-shift/blueprint</pre></div>
<div class="highlight highlight-source-shell notranslate position-relative overflow-auto" dir="auto" data-snippet-clipboard-copy-content="composer install"><pre>composer require --dev jasonmccreary/laravel-test-assertions</pre></div>
<p dir="auto">Normalement, il y a un fichier <code>draft.yaml</code>qui permet de générer l'ensemble des composents.</p>
<p dir="auto">Ensuite, lancez la commande : <code>php artisan blueprint:build</code> et faites un : <code>php artisan migrate</code>.</p>
<p dir="auto">Pour seeder l'application, le ficher <code>seeders.php</code> dans le dossier <code>config</code>vest nécessaire et ensuite effectuez la commande :</p>


   <div class="highlight highlight-source-shell notranslate position-relative overflow-auto" dir="auto" data-snippet-clipboard-copy-content="composer install"><pre>php artisan migrate:fresh --seed</pre></div>
   
   
   <h2 dir="auto"><a id="user-content-basic-usage" class="anchor" aria-hidden="true" href="#basic-usage"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M7.775 3.275a.75.75 0 001.06 1.06l1.25-1.25a2 2 0 112.83 2.83l-2.5 2.5a2 2 0 01-2.83 0 .75.75 0 00-1.06 1.06 3.5 3.5 0 004.95 0l2.5-2.5a3.5 3.5 0 00-4.95-4.95l-1.25 1.25zm-4.69 9.64a2 2 0 010-2.83l2.5-2.5a2 2 0 012.83 0 .75.75 0 001.06-1.06 3.5 3.5 0 00-4.95 0l-2.5 2.5a3.5 3.5 0 004.95 4.95l1.25-1.25a.75.75 0 00-1.06-1.06l-1.25 1.25a2 2 0 01-2.83 0z"></path></svg></a>API</h2>
   <h3 dir="auto"><a id="user-content-autoloading" class="anchor" aria-hidden="true" href="#autoloading"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M7.775 3.275a.75.75 0 001.06 1.06l1.25-1.25a2 2 0 112.83 2.83l-2.5 2.5a2 2 0 01-2.83 0 .75.75 0 00-1.06 1.06 3.5 3.5 0 004.95 0l2.5-2.5a3.5 3.5 0 00-4.95-4.95l-1.25 1.25zm-4.69 9.64a2 2 0 010-2.83l2.5-2.5a2 2 0 012.83 0 .75.75 0 001.06-1.06 3.5 3.5 0 00-4.95 0l-2.5 2.5a3.5 3.5 0 004.95 4.95l1.25-1.25a.75.75 0 00-1.06-1.06l-1.25 1.25a2 2 0 01-2.83 0z"></path></svg></a>Rôles</h3>
   
   <div class="highlight highlight-source-json notranslate position-relative overflow-auto" dir="auto" data-snippet-clipboard-copy-content="[
    {
        &quot;username&quot;: &quot;User&quot;,
        &quot;email&quot;: &quot;user@exemple.com&quot;,
        &quot;password&quot;: &quot;useruser&quot;
    },
    {
        &quot;username&quot;: &quot;Admin&quot;,
        &quot;email&quot;: &quot;admin@admin.com&quot;,
        &quot;password&quot;: &quot;admin&quot;
    },
    {
        &quot;username&quot;: &quot;SuperAdmin&quot;,
        &quot;email&quot;: &quot;superadmin@admin.com&quot;,
        &quot;password&quot;: &quot;superadmin&quot;
    }
]"><pre>[
    {
        <span class="pl-ent">"username"</span>: <span class="pl-s"><span class="pl-pds">"</span>User<span class="pl-pds">"</span></span>,
        <span class="pl-ent">"email"</span>: <span class="pl-s"><span class="pl-pds">"</span>user@exemple.com<span class="pl-pds">"</span></span>,
        <span class="pl-ent">"password"</span>: <span class="pl-s"><span class="pl-pds">"</span>useruser<span class="pl-pds">"</span></span>
    },
    {
        <span class="pl-ent">"username"</span>: <span class="pl-s"><span class="pl-pds">"</span>Admin<span class="pl-pds">"</span></span>,
        <span class="pl-ent">"email"</span>: <span class="pl-s"><span class="pl-pds">"</span>admin@admin.com<span class="pl-pds">"</span></span>,
        <span class="pl-ent">"password"</span>: <span class="pl-s"><span class="pl-pds">"</span>admin<span class="pl-pds">"</span></span>
    },
    {
        <span class="pl-ent">"username"</span>: <span class="pl-s"><span class="pl-pds">"</span>SuperAdmin<span class="pl-pds">"</span></span>,
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
</tr>
</thead>
<tbody>
<tr>
<td align="center"><a href="mailto:user@exemple.com">user@exemple.com</a></td>
<td align="center">user</td>
</tr>
<tr>
<td align="center"><a href="mailto:admin@admin.com">admin@admin.com</a></td>
<td align="center">user, admin</td>
</tr>
<tr>
<td align="center"><a href="mailto:superadmin@admin.com">superadmin@admin.com</a></td>
<td align="center">user, admin, superadmin</td>
</tr>
</tbody>
</table>

<h3 dir="auto"><a id="user-content-autoloading" class="anchor" aria-hidden="true" href="#autoloading"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M7.775 3.275a.75.75 0 001.06 1.06l1.25-1.25a2 2 0 112.83 2.83l-2.5 2.5a2 2 0 01-2.83 0 .75.75 0 00-1.06 1.06 3.5 3.5 0 004.95 0l2.5-2.5a3.5 3.5 0 00-4.95-4.95l-1.25 1.25zm-4.69 9.64a2 2 0 010-2.83l2.5-2.5a2 2 0 012.83 0 .75.75 0 001.06-1.06 3.5 3.5 0 00-4.95 0l-2.5 2.5a3.5 3.5 0 004.95 4.95l1.25-1.25a.75.75 0 00-1.06-1.06l-1.25 1.25a2 2 0 01-2.83 0z"></path></svg></a>Accès API</h3>

<p dir="auto">Sur Postman, faite un GET sur l'url <code>{host}/api/v1/login</code> Récupérer un bearer token et testez les requêtes sur l'ensemble des composents.</p>
