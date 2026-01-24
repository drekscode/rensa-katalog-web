<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.6.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.6.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-categories">
                                <a href="#endpoints-GETapi-categories">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-banners">
                                <a href="#endpoints-GETapi-banners">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-series">
                                <a href="#endpoints-GETapi-series">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-series-by-category--kategoriId-">
                                <a href="#endpoints-GETapi-series-by-category--kategoriId-">GET api/series/by-category/{kategoriId}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-series-paginate">
                                <a href="#endpoints-GETapi-series-paginate">GET api/series/paginate</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-articles">
                                <a href="#endpoints-GETapi-articles">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-articles-by-category-hp--kategoriId-">
                                <a href="#endpoints-GETapi-articles-by-category-hp--kategoriId-">GET api/articles/by-category/hp/{kategoriId}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-articles-by-category-tab--kategoriId-">
                                <a href="#endpoints-GETapi-articles-by-category-tab--kategoriId-">GET api/articles/by-category/tab/{kategoriId}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-articles-by-series--seriesId--products">
                                <a href="#endpoints-GETapi-articles-by-series--seriesId--products">GET api/articles/by-series/{seriesId}/products</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-formulas-by-category--kategoriId-">
                                <a href="#endpoints-GETapi-formulas-by-category--kategoriId-">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-products">
                                <a href="#endpoints-GETapi-products">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-stores">
                                <a href="#endpoints-GETapi-stores">Display a listing of the resource.</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: January 24, 2026</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://localhost</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETapi-categories">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-categories">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/categories" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/categories"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-categories">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;nama_kategori&quot;: &quot;Elektronik&quot;,
            &quot;keunggulan_produk&quot;: &quot;Produk elektronik berkualitas tinggi dengan garansi.&quot;,
            &quot;created_at&quot;: &quot;2026-01-16T10:07:50+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-16T10:07:50+00:00&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;nama_kategori&quot;: &quot;Pakaian&quot;,
            &quot;keunggulan_produk&quot;: &quot;Koleksi pakaian fashion terbaru dan nyaman.&quot;,
            &quot;created_at&quot;: &quot;2026-01-16T10:07:50+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-16T10:07:50+00:00&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;nama_kategori&quot;: &quot;Makanan&quot;,
            &quot;keunggulan_produk&quot;: &quot;Makanan sehat dan lezat untuk keluarga.&quot;,
            &quot;created_at&quot;: &quot;2026-01-16T10:07:50+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-16T10:07:50+00:00&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;nama_kategori&quot;: &quot;Atap Metal&quot;,
            &quot;keunggulan_produk&quot;: &quot;Ringan, tahan lama, dan anti karat. Cocok untuk berbagai jenis bangunan dari rumah tinggal hingga gedung komersial.&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;nama_kategori&quot;: &quot;Atap Bitumen&quot;,
            &quot;keunggulan_produk&quot;: &quot;Kedap air sempurna, fleksibel, dan mudah dipasang. Ideal untuk atap datar dan berbagai aplikasi waterproofing.&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;
        },
        {
            &quot;id&quot;: 6,
            &quot;nama_kategori&quot;: &quot;Atap Genteng&quot;,
            &quot;keunggulan_produk&quot;: &quot;Estetika klasik, isolasi panas yang baik, dan ramah lingkungan. Memberikan tampilan elegan pada bangunan.&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;
        },
        {
            &quot;id&quot;: 7,
            &quot;nama_kategori&quot;: &quot;Plafon&quot;,
            &quot;keunggulan_produk&quot;: &quot;Berbagai pilihan desain, mudah perawatan, dan meningkatkan estetika interior ruangan.&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;
        },
        {
            &quot;id&quot;: 8,
            &quot;nama_kategori&quot;: &quot;Dinding&quot;,
            &quot;keunggulan_produk&quot;: &quot;Kuat, tahan cuaca, dan mudah dipasang. Memberikan proteksi maksimal untuk bangunan Anda.&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-categories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-categories"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-categories">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-categories" data-method="GET"
      data-path="api/categories"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-categories"
                    onclick="tryItOut('GETapi-categories');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-categories"
                    onclick="cancelTryOut('GETapi-categories');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-categories"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/categories</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-banners">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-banners">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/banners" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/banners"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-banners">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;banner_image&quot;: &quot;https://via.placeholder.com/1200x400/4F46E5/ffffff?text=Promo+Atap+Metal&quot;,
            &quot;link&quot;: null,
            &quot;urutan&quot;: 1,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;banner_image&quot;: &quot;https://via.placeholder.com/1200x400/EC4899/ffffff?text=New+Bitumen+Series&quot;,
            &quot;link&quot;: null,
            &quot;urutan&quot;: 2,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;banner_image&quot;: &quot;https://via.placeholder.com/1200x400/10B981/ffffff?text=Genteng+Berkualitas&quot;,
            &quot;link&quot;: null,
            &quot;urutan&quot;: 3,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;banner_image&quot;: &quot;https://via.placeholder.com/1200x400/F59E0B/ffffff?text=Konsultasi+Gratis&quot;,
            &quot;link&quot;: null,
            &quot;urutan&quot;: 4,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-banners" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-banners"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-banners"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-banners" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-banners">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-banners" data-method="GET"
      data-path="api/banners"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-banners', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-banners"
                    onclick="tryItOut('GETapi-banners');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-banners"
                    onclick="cancelTryOut('GETapi-banners');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-banners"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/banners</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-banners"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-banners"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-series">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-series">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/series" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/series"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-series">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;kategori_id&quot;: 1,
            &quot;nama_series&quot;: &quot;Rensa Metal Roof Premium&quot;,
            &quot;struktur_img&quot;: &quot;https://via.placeholder.com/800x600/4F46E5/ffffff?text=Metal+Roof+Structure&quot;,
            &quot;cover_area&quot;: &quot;https://via.placeholder.com/600x400/4F46E5/ffffff?text=Cover+1.05m2&quot;,
            &quot;material&quot;: &quot;Zinc-Aluminium coating steel&quot;,
            &quot;deskripsi_produk&quot;: &quot;Atap metal premium dengan lapisan zinc-aluminium untuk perlindungan maksimal terhadap korosi. Tersedia dalam berbagai warna dan profil.&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;kategori&quot;: {
                &quot;id&quot;: 1,
                &quot;nama_kategori&quot;: &quot;Elektronik&quot;,
                &quot;keunggulan_produk&quot;: &quot;Produk elektronik berkualitas tinggi dengan garansi.&quot;,
                &quot;created_at&quot;: &quot;2026-01-16T10:07:50+00:00&quot;,
                &quot;updated_at&quot;: &quot;2026-01-16T10:07:50+00:00&quot;
            }
        },
        {
            &quot;id&quot;: 2,
            &quot;kategori_id&quot;: 1,
            &quot;nama_series&quot;: &quot;Rensa Spandek Pro&quot;,
            &quot;struktur_img&quot;: &quot;https://via.placeholder.com/800x600/7C3AED/ffffff?text=Spandek+Structure&quot;,
            &quot;cover_area&quot;: &quot;https://via.placeholder.com/600x400/7C3AED/ffffff?text=Cover+1.00m2&quot;,
            &quot;material&quot;: &quot;Galvalume steel&quot;,
            &quot;deskripsi_produk&quot;: &quot;Atap spandek berkualitas tinggi dengan ketahanan korosi superior. Cocok untuk bangunan industri dan komersial.&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;kategori&quot;: {
                &quot;id&quot;: 1,
                &quot;nama_kategori&quot;: &quot;Elektronik&quot;,
                &quot;keunggulan_produk&quot;: &quot;Produk elektronik berkualitas tinggi dengan garansi.&quot;,
                &quot;created_at&quot;: &quot;2026-01-16T10:07:50+00:00&quot;,
                &quot;updated_at&quot;: &quot;2026-01-16T10:07:50+00:00&quot;
            }
        },
        {
            &quot;id&quot;: 3,
            &quot;kategori_id&quot;: 2,
            &quot;nama_series&quot;: &quot;Rensa Bitumen Shield&quot;,
            &quot;struktur_img&quot;: &quot;https://via.placeholder.com/800x600/EC4899/ffffff?text=Bitumen+Shield&quot;,
            &quot;cover_area&quot;: &quot;https://via.placeholder.com/600x400/EC4899/ffffff?text=Cover+10m2&quot;,
            &quot;material&quot;: &quot;Modified bitumen membrane&quot;,
            &quot;deskripsi_produk&quot;: &quot;Membran bitumen modified dengan daya rekat tinggi. Solusi waterproofing terbaik untuk atap datar.&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;kategori&quot;: {
                &quot;id&quot;: 2,
                &quot;nama_kategori&quot;: &quot;Pakaian&quot;,
                &quot;keunggulan_produk&quot;: &quot;Koleksi pakaian fashion terbaru dan nyaman.&quot;,
                &quot;created_at&quot;: &quot;2026-01-16T10:07:50+00:00&quot;,
                &quot;updated_at&quot;: &quot;2026-01-16T10:07:50+00:00&quot;
            }
        },
        {
            &quot;id&quot;: 4,
            &quot;kategori_id&quot;: 3,
            &quot;nama_series&quot;: &quot;Rensa Genteng Keramik&quot;,
            &quot;struktur_img&quot;: &quot;https://via.placeholder.com/800x600/F59E0B/ffffff?text=Ceramic+Tile&quot;,
            &quot;cover_area&quot;: &quot;https://via.placeholder.com/600x400/F59E0B/ffffff?text=Cover+10pcs/m2&quot;,
            &quot;material&quot;: &quot;High quality ceramic&quot;,
            &quot;deskripsi_produk&quot;: &quot;Genteng keramik dengan finishing glazur. Tahan lama, tidak pudar, dan memberikan kesan mewah.&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;kategori&quot;: {
                &quot;id&quot;: 3,
                &quot;nama_kategori&quot;: &quot;Makanan&quot;,
                &quot;keunggulan_produk&quot;: &quot;Makanan sehat dan lezat untuk keluarga.&quot;,
                &quot;created_at&quot;: &quot;2026-01-16T10:07:50+00:00&quot;,
                &quot;updated_at&quot;: &quot;2026-01-16T10:07:50+00:00&quot;
            }
        },
        {
            &quot;id&quot;: 5,
            &quot;kategori_id&quot;: 3,
            &quot;nama_series&quot;: &quot;Rensa Genteng Beton&quot;,
            &quot;struktur_img&quot;: &quot;https://via.placeholder.com/800x600/10B981/ffffff?text=Concrete+Tile&quot;,
            &quot;cover_area&quot;: &quot;https://via.placeholder.com/600x400/10B981/ffffff?text=Cover+10pcs/m2&quot;,
            &quot;material&quot;: &quot;High strength concrete&quot;,
            &quot;deskripsi_produk&quot;: &quot;Genteng beton dengan kekuatan tinggi. Ekonomis dan tahan terhadap perubahan cuaca ekstrem.&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;kategori&quot;: {
                &quot;id&quot;: 3,
                &quot;nama_kategori&quot;: &quot;Makanan&quot;,
                &quot;keunggulan_produk&quot;: &quot;Makanan sehat dan lezat untuk keluarga.&quot;,
                &quot;created_at&quot;: &quot;2026-01-16T10:07:50+00:00&quot;,
                &quot;updated_at&quot;: &quot;2026-01-16T10:07:50+00:00&quot;
            }
        },
        {
            &quot;id&quot;: 6,
            &quot;kategori_id&quot;: 4,
            &quot;nama_series&quot;: &quot;Rensa Gypsum Board&quot;,
            &quot;struktur_img&quot;: &quot;https://via.placeholder.com/800x600/3B82F6/ffffff?text=Gypsum+Board&quot;,
            &quot;cover_area&quot;: &quot;https://via.placeholder.com/600x400/3B82F6/ffffff?text=Cover+2.88m2&quot;,
            &quot;material&quot;: &quot;Gypsum core with paper liner&quot;,
            &quot;deskripsi_produk&quot;: &quot;Plafon gypsum berkualitas tinggi untuk interior modern. Permukaan halus dan mudah finishing.&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;kategori&quot;: {
                &quot;id&quot;: 4,
                &quot;nama_kategori&quot;: &quot;Atap Metal&quot;,
                &quot;keunggulan_produk&quot;: &quot;Ringan, tahan lama, dan anti karat. Cocok untuk berbagai jenis bangunan dari rumah tinggal hingga gedung komersial.&quot;,
                &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
                &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;
            }
        },
        {
            &quot;id&quot;: 7,
            &quot;kategori_id&quot;: 4,
            &quot;nama_series&quot;: &quot;Rensa PVC Ceiling&quot;,
            &quot;struktur_img&quot;: &quot;https://via.placeholder.com/800x600/8B5CF6/ffffff?text=PVC+Ceiling&quot;,
            &quot;cover_area&quot;: &quot;https://via.placeholder.com/600x400/8B5CF6/ffffff?text=Cover+3m&quot;,
            &quot;material&quot;: &quot;UV resistant PVC&quot;,
            &quot;deskripsi_produk&quot;: &quot;Plafon PVC anti air dan mudah dibersihkan. Ideal untuk kamar mandi dan area basah.&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;kategori&quot;: {
                &quot;id&quot;: 4,
                &quot;nama_kategori&quot;: &quot;Atap Metal&quot;,
                &quot;keunggulan_produk&quot;: &quot;Ringan, tahan lama, dan anti karat. Cocok untuk berbagai jenis bangunan dari rumah tinggal hingga gedung komersial.&quot;,
                &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
                &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;
            }
        },
        {
            &quot;id&quot;: 8,
            &quot;kategori_id&quot;: 5,
            &quot;nama_series&quot;: &quot;Rensa Wall Panel&quot;,
            &quot;struktur_img&quot;: &quot;https://via.placeholder.com/800x600/EF4444/ffffff?text=Wall+Panel&quot;,
            &quot;cover_area&quot;: &quot;https://via.placeholder.com/600x400/EF4444/ffffff?text=Cover+2.4m2&quot;,
            &quot;material&quot;: &quot;Composite sandwich panel&quot;,
            &quot;deskripsi_produk&quot;: &quot;Panel dinding sandwich dengan insulasi thermal. Ringan, kuat, dan cepat dipasang.&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;kategori&quot;: {
                &quot;id&quot;: 5,
                &quot;nama_kategori&quot;: &quot;Atap Bitumen&quot;,
                &quot;keunggulan_produk&quot;: &quot;Kedap air sempurna, fleksibel, dan mudah dipasang. Ideal untuk atap datar dan berbagai aplikasi waterproofing.&quot;,
                &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
                &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-series" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-series"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-series"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-series" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-series">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-series" data-method="GET"
      data-path="api/series"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-series', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-series"
                    onclick="tryItOut('GETapi-series');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-series"
                    onclick="cancelTryOut('GETapi-series');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-series"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/series</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-series"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-series"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-series-by-category--kategoriId-">GET api/series/by-category/{kategoriId}</h2>

<p>
</p>



<span id="example-requests-GETapi-series-by-category--kategoriId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/series/by-category/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/series/by-category/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-series-by-category--kategoriId-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: []
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-series-by-category--kategoriId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-series-by-category--kategoriId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-series-by-category--kategoriId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-series-by-category--kategoriId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-series-by-category--kategoriId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-series-by-category--kategoriId-" data-method="GET"
      data-path="api/series/by-category/{kategoriId}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-series-by-category--kategoriId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-series-by-category--kategoriId-"
                    onclick="tryItOut('GETapi-series-by-category--kategoriId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-series-by-category--kategoriId-"
                    onclick="cancelTryOut('GETapi-series-by-category--kategoriId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-series-by-category--kategoriId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/series/by-category/{kategoriId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-series-by-category--kategoriId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-series-by-category--kategoriId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>kategoriId</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="kategoriId"                data-endpoint="GETapi-series-by-category--kategoriId-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-series-paginate">GET api/series/paginate</h2>

<p>
</p>



<span id="example-requests-GETapi-series-paginate">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/series/paginate" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/series/paginate"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-series-paginate">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;kategori_id&quot;: 1,
            &quot;nama_series&quot;: &quot;Rensa Metal Roof Premium&quot;,
            &quot;struktur_img&quot;: &quot;https://via.placeholder.com/800x600/4F46E5/ffffff?text=Metal+Roof+Structure&quot;,
            &quot;cover_area&quot;: &quot;https://via.placeholder.com/600x400/4F46E5/ffffff?text=Cover+1.05m2&quot;,
            &quot;material&quot;: &quot;Zinc-Aluminium coating steel&quot;,
            &quot;deskripsi_produk&quot;: &quot;Atap metal premium dengan lapisan zinc-aluminium untuk perlindungan maksimal terhadap korosi. Tersedia dalam berbagai warna dan profil.&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;kategori&quot;: {
                &quot;id&quot;: 1,
                &quot;nama_kategori&quot;: &quot;Elektronik&quot;,
                &quot;keunggulan_produk&quot;: &quot;Produk elektronik berkualitas tinggi dengan garansi.&quot;,
                &quot;created_at&quot;: &quot;2026-01-16T10:07:50+00:00&quot;,
                &quot;updated_at&quot;: &quot;2026-01-16T10:07:50+00:00&quot;
            }
        },
        {
            &quot;id&quot;: 2,
            &quot;kategori_id&quot;: 1,
            &quot;nama_series&quot;: &quot;Rensa Spandek Pro&quot;,
            &quot;struktur_img&quot;: &quot;https://via.placeholder.com/800x600/7C3AED/ffffff?text=Spandek+Structure&quot;,
            &quot;cover_area&quot;: &quot;https://via.placeholder.com/600x400/7C3AED/ffffff?text=Cover+1.00m2&quot;,
            &quot;material&quot;: &quot;Galvalume steel&quot;,
            &quot;deskripsi_produk&quot;: &quot;Atap spandek berkualitas tinggi dengan ketahanan korosi superior. Cocok untuk bangunan industri dan komersial.&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;kategori&quot;: {
                &quot;id&quot;: 1,
                &quot;nama_kategori&quot;: &quot;Elektronik&quot;,
                &quot;keunggulan_produk&quot;: &quot;Produk elektronik berkualitas tinggi dengan garansi.&quot;,
                &quot;created_at&quot;: &quot;2026-01-16T10:07:50+00:00&quot;,
                &quot;updated_at&quot;: &quot;2026-01-16T10:07:50+00:00&quot;
            }
        },
        {
            &quot;id&quot;: 3,
            &quot;kategori_id&quot;: 2,
            &quot;nama_series&quot;: &quot;Rensa Bitumen Shield&quot;,
            &quot;struktur_img&quot;: &quot;https://via.placeholder.com/800x600/EC4899/ffffff?text=Bitumen+Shield&quot;,
            &quot;cover_area&quot;: &quot;https://via.placeholder.com/600x400/EC4899/ffffff?text=Cover+10m2&quot;,
            &quot;material&quot;: &quot;Modified bitumen membrane&quot;,
            &quot;deskripsi_produk&quot;: &quot;Membran bitumen modified dengan daya rekat tinggi. Solusi waterproofing terbaik untuk atap datar.&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;kategori&quot;: {
                &quot;id&quot;: 2,
                &quot;nama_kategori&quot;: &quot;Pakaian&quot;,
                &quot;keunggulan_produk&quot;: &quot;Koleksi pakaian fashion terbaru dan nyaman.&quot;,
                &quot;created_at&quot;: &quot;2026-01-16T10:07:50+00:00&quot;,
                &quot;updated_at&quot;: &quot;2026-01-16T10:07:50+00:00&quot;
            }
        },
        {
            &quot;id&quot;: 4,
            &quot;kategori_id&quot;: 3,
            &quot;nama_series&quot;: &quot;Rensa Genteng Keramik&quot;,
            &quot;struktur_img&quot;: &quot;https://via.placeholder.com/800x600/F59E0B/ffffff?text=Ceramic+Tile&quot;,
            &quot;cover_area&quot;: &quot;https://via.placeholder.com/600x400/F59E0B/ffffff?text=Cover+10pcs/m2&quot;,
            &quot;material&quot;: &quot;High quality ceramic&quot;,
            &quot;deskripsi_produk&quot;: &quot;Genteng keramik dengan finishing glazur. Tahan lama, tidak pudar, dan memberikan kesan mewah.&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;kategori&quot;: {
                &quot;id&quot;: 3,
                &quot;nama_kategori&quot;: &quot;Makanan&quot;,
                &quot;keunggulan_produk&quot;: &quot;Makanan sehat dan lezat untuk keluarga.&quot;,
                &quot;created_at&quot;: &quot;2026-01-16T10:07:50+00:00&quot;,
                &quot;updated_at&quot;: &quot;2026-01-16T10:07:50+00:00&quot;
            }
        }
    ],
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;per_page&quot;: 4,
        &quot;total&quot;: 8,
        &quot;sisa_item&quot;: 4
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-series-paginate" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-series-paginate"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-series-paginate"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-series-paginate" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-series-paginate">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-series-paginate" data-method="GET"
      data-path="api/series/paginate"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-series-paginate', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-series-paginate"
                    onclick="tryItOut('GETapi-series-paginate');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-series-paginate"
                    onclick="cancelTryOut('GETapi-series-paginate');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-series-paginate"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/series/paginate</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-series-paginate"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-series-paginate"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-articles">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-articles">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/articles" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/articles"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-articles">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;kategori_id&quot;: 1,
            &quot;judul&quot;: &quot;Tips Memilih Atap yang Tepat&quot;,
            &quot;slug&quot;: &quot;tips-memilih-atap-yang-tepat&quot;,
            &quot;foto&quot;: &quot;https://via.placeholder.com/800x600/4F46E5/ffffff?text=Tips+Memilih+Atap&quot;,
            &quot;deskripsi&quot;: &quot;Memilih atap yang tepat adalah keputusan penting dalam pembangunan rumah. Berikut beberapa faktor yang perlu dipertimbangkan: 1) Budget, 2) Iklim setempat, 3) Gaya arsitektur, 4) Daya tahan, 5) Perawatan. Atap metal cocok untuk daerah tropis karena tahan panas dan anti karat, sementara genteng keramik memberikan kesan klasik dan elegan.&quot;,
            &quot;hastag_kategori&quot;: &quot;tips,atap,konstruksi&quot;,
            &quot;date&quot;: &quot;2026-01-15&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;kategori&quot;: {
                &quot;id&quot;: 1,
                &quot;nama_kategori&quot;: &quot;Elektronik&quot;,
                &quot;keunggulan_produk&quot;: &quot;Produk elektronik berkualitas tinggi dengan garansi.&quot;,
                &quot;created_at&quot;: &quot;2026-01-16T10:07:50+00:00&quot;,
                &quot;updated_at&quot;: &quot;2026-01-16T10:07:50+00:00&quot;
            }
        },
        {
            &quot;id&quot;: 2,
            &quot;kategori_id&quot;: 2,
            &quot;judul&quot;: &quot;Keunggulan Atap Bitumen&quot;,
            &quot;slug&quot;: &quot;keunggulan-atap-bitumen&quot;,
            &quot;foto&quot;: &quot;https://via.placeholder.com/800x600/EC4899/ffffff?text=Atap+Bitumen&quot;,
            &quot;deskripsi&quot;: &quot;Atap bitumen semakin populer untuk bangunan modern karena berbagai keunggulannya. Material ini menawarkan waterproofing yang sempurna, fleksibilitas tinggi, dan mudah dipasang bahkan pada permukaan yang tidak rata. Cocok for atap datar, teras, dan berbagai aplikasi waterproofing lainnya.&quot;,
            &quot;hastag_kategori&quot;: &quot;bitumen,waterproofing,modern&quot;,
            &quot;date&quot;: &quot;2026-01-10&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;kategori&quot;: {
                &quot;id&quot;: 2,
                &quot;nama_kategori&quot;: &quot;Pakaian&quot;,
                &quot;keunggulan_produk&quot;: &quot;Koleksi pakaian fashion terbaru dan nyaman.&quot;,
                &quot;created_at&quot;: &quot;2026-01-16T10:07:50+00:00&quot;,
                &quot;updated_at&quot;: &quot;2026-01-16T10:07:50+00:00&quot;
            }
        },
        {
            &quot;id&quot;: 3,
            &quot;kategori_id&quot;: 1,
            &quot;judul&quot;: &quot;Panduan Perawatan Atap Metal&quot;,
            &quot;slug&quot;: &quot;panduan-perawatan-atap-metal&quot;,
            &quot;foto&quot;: &quot;https://via.placeholder.com/800x600/10B981/ffffff?text=Perawatan+Atap&quot;,
            &quot;deskripsi&quot;: &quot;Atap metal terkenal dengan daya tahannya, namun tetap memerlukan perawatan berkala. Lakukan inspeksi rutin setiap 6 bulan, bersihkan dari kotoran dan lumut, periksa sekrup dan baut, serta cat ulang jika diperlukan. Dengan perawatan yang tepat, atap metal dapat bertahan hingga 30-50 tahun.&quot;,
            &quot;hastag_kategori&quot;: &quot;perawatan,atap metal,tips&quot;,
            &quot;date&quot;: &quot;2026-01-05&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;kategori&quot;: {
                &quot;id&quot;: 1,
                &quot;nama_kategori&quot;: &quot;Elektronik&quot;,
                &quot;keunggulan_produk&quot;: &quot;Produk elektronik berkualitas tinggi dengan garansi.&quot;,
                &quot;created_at&quot;: &quot;2026-01-16T10:07:50+00:00&quot;,
                &quot;updated_at&quot;: &quot;2026-01-16T10:07:50+00:00&quot;
            }
        },
        {
            &quot;id&quot;: 4,
            &quot;kategori_id&quot;: 4,
            &quot;judul&quot;: &quot;Tren Desain Plafon Modern&quot;,
            &quot;slug&quot;: &quot;tren-desain-plafon-modern&quot;,
            &quot;foto&quot;: &quot;https://via.placeholder.com/800x600/F59E0B/ffffff?text=Desain+Plafon&quot;,
            &quot;deskripsi&quot;: &quot;Plafon tidak hanya berfungsi sebagai penutup langit-langit, tetapi juga elemen penting dalam desain interior. Tren saat ini mencakup plafon dengan pencahayaan tersembunyi, kombinasi material, dan desain bertingkat. Gypsum board sangat fleksibel untuk berbagai kreasi desain modern.&quot;,
            &quot;hastag_kategori&quot;: &quot;plafon,interior,desain&quot;,
            &quot;date&quot;: &quot;2025-12-28&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;kategori&quot;: {
                &quot;id&quot;: 4,
                &quot;nama_kategori&quot;: &quot;Atap Metal&quot;,
                &quot;keunggulan_produk&quot;: &quot;Ringan, tahan lama, dan anti karat. Cocok untuk berbagai jenis bangunan dari rumah tinggal hingga gedung komersial.&quot;,
                &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
                &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;
            }
        },
        {
            &quot;id&quot;: 5,
            &quot;kategori_id&quot;: 3,
            &quot;judul&quot;: &quot;Mengapa Genteng Beton Lebih Ekonomis&quot;,
            &quot;slug&quot;: &quot;mengapa-genteng-beton-lebih-ekonomis&quot;,
            &quot;foto&quot;: &quot;https://via.placeholder.com/800x600/8B5CF6/ffffff?text=Genteng+Beton&quot;,
            &quot;deskripsi&quot;: &quot;Genteng beton menawarkan solusi atap yang ekonomis tanpa mengorbankan kualitas. Dengan harga lebih terjangkau dibanding genteng keramik, genteng beton memiliki kekuatan yang tinggi dan daya tahan luar biasa. Material ini juga memiliki kemampuan insulasi panas yang baik, membantu menjaga suhu ruangan tetap nyaman.&quot;,
            &quot;hastag_kategori&quot;: &quot;genteng,beton,ekonomis&quot;,
            &quot;date&quot;: &quot;2025-12-20&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;kategori&quot;: {
                &quot;id&quot;: 3,
                &quot;nama_kategori&quot;: &quot;Makanan&quot;,
                &quot;keunggulan_produk&quot;: &quot;Makanan sehat dan lezat untuk keluarga.&quot;,
                &quot;created_at&quot;: &quot;2026-01-16T10:07:50+00:00&quot;,
                &quot;updated_at&quot;: &quot;2026-01-16T10:07:50+00:00&quot;
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-articles" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-articles"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-articles"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-articles" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-articles">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-articles" data-method="GET"
      data-path="api/articles"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-articles', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-articles"
                    onclick="tryItOut('GETapi-articles');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-articles"
                    onclick="cancelTryOut('GETapi-articles');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-articles"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/articles</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-articles"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-articles"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-articles-by-category-hp--kategoriId-">GET api/articles/by-category/hp/{kategoriId}</h2>

<p>
</p>



<span id="example-requests-GETapi-articles-by-category-hp--kategoriId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/articles/by-category/hp/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/articles/by-category/hp/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-articles-by-category-hp--kategoriId-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: []
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-articles-by-category-hp--kategoriId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-articles-by-category-hp--kategoriId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-articles-by-category-hp--kategoriId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-articles-by-category-hp--kategoriId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-articles-by-category-hp--kategoriId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-articles-by-category-hp--kategoriId-" data-method="GET"
      data-path="api/articles/by-category/hp/{kategoriId}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-articles-by-category-hp--kategoriId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-articles-by-category-hp--kategoriId-"
                    onclick="tryItOut('GETapi-articles-by-category-hp--kategoriId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-articles-by-category-hp--kategoriId-"
                    onclick="cancelTryOut('GETapi-articles-by-category-hp--kategoriId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-articles-by-category-hp--kategoriId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/articles/by-category/hp/{kategoriId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-articles-by-category-hp--kategoriId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-articles-by-category-hp--kategoriId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>kategoriId</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="kategoriId"                data-endpoint="GETapi-articles-by-category-hp--kategoriId-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-articles-by-category-tab--kategoriId-">GET api/articles/by-category/tab/{kategoriId}</h2>

<p>
</p>



<span id="example-requests-GETapi-articles-by-category-tab--kategoriId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/articles/by-category/tab/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/articles/by-category/tab/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-articles-by-category-tab--kategoriId-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: []
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-articles-by-category-tab--kategoriId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-articles-by-category-tab--kategoriId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-articles-by-category-tab--kategoriId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-articles-by-category-tab--kategoriId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-articles-by-category-tab--kategoriId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-articles-by-category-tab--kategoriId-" data-method="GET"
      data-path="api/articles/by-category/tab/{kategoriId}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-articles-by-category-tab--kategoriId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-articles-by-category-tab--kategoriId-"
                    onclick="tryItOut('GETapi-articles-by-category-tab--kategoriId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-articles-by-category-tab--kategoriId-"
                    onclick="cancelTryOut('GETapi-articles-by-category-tab--kategoriId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-articles-by-category-tab--kategoriId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/articles/by-category/tab/{kategoriId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-articles-by-category-tab--kategoriId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-articles-by-category-tab--kategoriId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>kategoriId</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="kategoriId"                data-endpoint="GETapi-articles-by-category-tab--kategoriId-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-articles-by-series--seriesId--products">GET api/articles/by-series/{seriesId}/products</h2>

<p>
</p>



<span id="example-requests-GETapi-articles-by-series--seriesId--products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/articles/by-series/architecto/products" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/articles/by-series/architecto/products"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-articles-by-series--seriesId--products">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\Series] architecto&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-articles-by-series--seriesId--products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-articles-by-series--seriesId--products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-articles-by-series--seriesId--products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-articles-by-series--seriesId--products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-articles-by-series--seriesId--products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-articles-by-series--seriesId--products" data-method="GET"
      data-path="api/articles/by-series/{seriesId}/products"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-articles-by-series--seriesId--products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-articles-by-series--seriesId--products"
                    onclick="tryItOut('GETapi-articles-by-series--seriesId--products');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-articles-by-series--seriesId--products"
                    onclick="cancelTryOut('GETapi-articles-by-series--seriesId--products');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-articles-by-series--seriesId--products"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/articles/by-series/{seriesId}/products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-articles-by-series--seriesId--products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-articles-by-series--seriesId--products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>seriesId</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="seriesId"                data-endpoint="GETapi-articles-by-series--seriesId--products"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-formulas-by-category--kategoriId-">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-formulas-by-category--kategoriId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/formulas/by-category/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/formulas/by-category/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-formulas-by-category--kategoriId-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: []
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-formulas-by-category--kategoriId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-formulas-by-category--kategoriId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-formulas-by-category--kategoriId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-formulas-by-category--kategoriId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-formulas-by-category--kategoriId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-formulas-by-category--kategoriId-" data-method="GET"
      data-path="api/formulas/by-category/{kategoriId}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-formulas-by-category--kategoriId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-formulas-by-category--kategoriId-"
                    onclick="tryItOut('GETapi-formulas-by-category--kategoriId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-formulas-by-category--kategoriId-"
                    onclick="cancelTryOut('GETapi-formulas-by-category--kategoriId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-formulas-by-category--kategoriId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/formulas/by-category/{kategoriId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-formulas-by-category--kategoriId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-formulas-by-category--kategoriId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>kategoriId</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="kategoriId"                data-endpoint="GETapi-formulas-by-category--kategoriId-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-products">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/products" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/products"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-products">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;series_id&quot;: 1,
            &quot;nama_product&quot;: &quot;Metal Roof Premium - Red&quot;,
            &quot;thumbnail&quot;: &quot;https://via.placeholder.com/300x300/DC2626/ffffff?text=Red&quot;,
            &quot;big_pic&quot;: &quot;https://via.placeholder.com/1200x800/DC2626/ffffff?text=Metal+Roof+Red&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;series&quot;: {
                &quot;id&quot;: 1,
                &quot;kategori_id&quot;: 1,
                &quot;nama_series&quot;: &quot;Rensa Metal Roof Premium&quot;,
                &quot;struktur_img&quot;: &quot;https://via.placeholder.com/800x600/4F46E5/ffffff?text=Metal+Roof+Structure&quot;,
                &quot;cover_area&quot;: &quot;https://via.placeholder.com/600x400/4F46E5/ffffff?text=Cover+1.05m2&quot;,
                &quot;material&quot;: &quot;Zinc-Aluminium coating steel&quot;,
                &quot;deskripsi_produk&quot;: &quot;Atap metal premium dengan lapisan zinc-aluminium untuk perlindungan maksimal terhadap korosi. Tersedia dalam berbagai warna dan profil.&quot;,
                &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
                &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;
            }
        },
        {
            &quot;id&quot;: 2,
            &quot;series_id&quot;: 1,
            &quot;nama_product&quot;: &quot;Metal Roof Premium - Blue&quot;,
            &quot;thumbnail&quot;: &quot;https://via.placeholder.com/300x300/2563EB/ffffff?text=Blue&quot;,
            &quot;big_pic&quot;: &quot;https://via.placeholder.com/1200x800/2563EB/ffffff?text=Metal+Roof+Blue&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;series&quot;: {
                &quot;id&quot;: 1,
                &quot;kategori_id&quot;: 1,
                &quot;nama_series&quot;: &quot;Rensa Metal Roof Premium&quot;,
                &quot;struktur_img&quot;: &quot;https://via.placeholder.com/800x600/4F46E5/ffffff?text=Metal+Roof+Structure&quot;,
                &quot;cover_area&quot;: &quot;https://via.placeholder.com/600x400/4F46E5/ffffff?text=Cover+1.05m2&quot;,
                &quot;material&quot;: &quot;Zinc-Aluminium coating steel&quot;,
                &quot;deskripsi_produk&quot;: &quot;Atap metal premium dengan lapisan zinc-aluminium untuk perlindungan maksimal terhadap korosi. Tersedia dalam berbagai warna dan profil.&quot;,
                &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
                &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;
            }
        },
        {
            &quot;id&quot;: 3,
            &quot;series_id&quot;: 1,
            &quot;nama_product&quot;: &quot;Metal Roof Premium - Green&quot;,
            &quot;thumbnail&quot;: &quot;https://via.placeholder.com/300x300/059669/ffffff?text=Green&quot;,
            &quot;big_pic&quot;: &quot;https://via.placeholder.com/1200x800/059669/ffffff?text=Metal+Roof+Green&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;series&quot;: {
                &quot;id&quot;: 1,
                &quot;kategori_id&quot;: 1,
                &quot;nama_series&quot;: &quot;Rensa Metal Roof Premium&quot;,
                &quot;struktur_img&quot;: &quot;https://via.placeholder.com/800x600/4F46E5/ffffff?text=Metal+Roof+Structure&quot;,
                &quot;cover_area&quot;: &quot;https://via.placeholder.com/600x400/4F46E5/ffffff?text=Cover+1.05m2&quot;,
                &quot;material&quot;: &quot;Zinc-Aluminium coating steel&quot;,
                &quot;deskripsi_produk&quot;: &quot;Atap metal premium dengan lapisan zinc-aluminium untuk perlindungan maksimal terhadap korosi. Tersedia dalam berbagai warna dan profil.&quot;,
                &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
                &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;
            }
        },
        {
            &quot;id&quot;: 4,
            &quot;series_id&quot;: 2,
            &quot;nama_product&quot;: &quot;Spandek Pro - Natural Silver&quot;,
            &quot;thumbnail&quot;: &quot;https://via.placeholder.com/300x300/94A3B8/ffffff?text=Silver&quot;,
            &quot;big_pic&quot;: &quot;https://via.placeholder.com/1200x800/94A3B8/ffffff?text=Spandek+Silver&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;series&quot;: {
                &quot;id&quot;: 2,
                &quot;kategori_id&quot;: 1,
                &quot;nama_series&quot;: &quot;Rensa Spandek Pro&quot;,
                &quot;struktur_img&quot;: &quot;https://via.placeholder.com/800x600/7C3AED/ffffff?text=Spandek+Structure&quot;,
                &quot;cover_area&quot;: &quot;https://via.placeholder.com/600x400/7C3AED/ffffff?text=Cover+1.00m2&quot;,
                &quot;material&quot;: &quot;Galvalume steel&quot;,
                &quot;deskripsi_produk&quot;: &quot;Atap spandek berkualitas tinggi dengan ketahanan korosi superior. Cocok untuk bangunan industri dan komersial.&quot;,
                &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
                &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;
            }
        },
        {
            &quot;id&quot;: 5,
            &quot;series_id&quot;: 2,
            &quot;nama_product&quot;: &quot;Spandek Pro - Dark Grey&quot;,
            &quot;thumbnail&quot;: &quot;https://via.placeholder.com/300x300/475569/ffffff?text=Grey&quot;,
            &quot;big_pic&quot;: &quot;https://via.placeholder.com/1200x800/475569/ffffff?text=Spandek+Grey&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;series&quot;: {
                &quot;id&quot;: 2,
                &quot;kategori_id&quot;: 1,
                &quot;nama_series&quot;: &quot;Rensa Spandek Pro&quot;,
                &quot;struktur_img&quot;: &quot;https://via.placeholder.com/800x600/7C3AED/ffffff?text=Spandek+Structure&quot;,
                &quot;cover_area&quot;: &quot;https://via.placeholder.com/600x400/7C3AED/ffffff?text=Cover+1.00m2&quot;,
                &quot;material&quot;: &quot;Galvalume steel&quot;,
                &quot;deskripsi_produk&quot;: &quot;Atap spandek berkualitas tinggi dengan ketahanan korosi superior. Cocok untuk bangunan industri dan komersial.&quot;,
                &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
                &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;
            }
        },
        {
            &quot;id&quot;: 6,
            &quot;series_id&quot;: 3,
            &quot;nama_product&quot;: &quot;Bitumen Shield - Standard Roll&quot;,
            &quot;thumbnail&quot;: &quot;https://via.placeholder.com/300x300/1F2937/ffffff?text=Bitumen&quot;,
            &quot;big_pic&quot;: &quot;https://via.placeholder.com/1200x800/1F2937/ffffff?text=Bitumen+Roll&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;series&quot;: {
                &quot;id&quot;: 3,
                &quot;kategori_id&quot;: 2,
                &quot;nama_series&quot;: &quot;Rensa Bitumen Shield&quot;,
                &quot;struktur_img&quot;: &quot;https://via.placeholder.com/800x600/EC4899/ffffff?text=Bitumen+Shield&quot;,
                &quot;cover_area&quot;: &quot;https://via.placeholder.com/600x400/EC4899/ffffff?text=Cover+10m2&quot;,
                &quot;material&quot;: &quot;Modified bitumen membrane&quot;,
                &quot;deskripsi_produk&quot;: &quot;Membran bitumen modified dengan daya rekat tinggi. Solusi waterproofing terbaik untuk atap datar.&quot;,
                &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
                &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;
            }
        },
        {
            &quot;id&quot;: 7,
            &quot;series_id&quot;: 4,
            &quot;nama_product&quot;: &quot;Genteng Keramik - Gelombang Merah&quot;,
            &quot;thumbnail&quot;: &quot;https://via.placeholder.com/300x300/B91C1C/ffffff?text=Ceramic+Red&quot;,
            &quot;big_pic&quot;: &quot;https://via.placeholder.com/1200x800/B91C1C/ffffff?text=Genteng+Merah&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;series&quot;: {
                &quot;id&quot;: 4,
                &quot;kategori_id&quot;: 3,
                &quot;nama_series&quot;: &quot;Rensa Genteng Keramik&quot;,
                &quot;struktur_img&quot;: &quot;https://via.placeholder.com/800x600/F59E0B/ffffff?text=Ceramic+Tile&quot;,
                &quot;cover_area&quot;: &quot;https://via.placeholder.com/600x400/F59E0B/ffffff?text=Cover+10pcs/m2&quot;,
                &quot;material&quot;: &quot;High quality ceramic&quot;,
                &quot;deskripsi_produk&quot;: &quot;Genteng keramik dengan finishing glazur. Tahan lama, tidak pudar, dan memberikan kesan mewah.&quot;,
                &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
                &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;
            }
        },
        {
            &quot;id&quot;: 8,
            &quot;series_id&quot;: 4,
            &quot;nama_product&quot;: &quot;Genteng Keramik - Gelombang Coklat&quot;,
            &quot;thumbnail&quot;: &quot;https://via.placeholder.com/300x300/92400E/ffffff?text=Ceramic+Brown&quot;,
            &quot;big_pic&quot;: &quot;https://via.placeholder.com/1200x800/92400E/ffffff?text=Genteng+Coklat&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;series&quot;: {
                &quot;id&quot;: 4,
                &quot;kategori_id&quot;: 3,
                &quot;nama_series&quot;: &quot;Rensa Genteng Keramik&quot;,
                &quot;struktur_img&quot;: &quot;https://via.placeholder.com/800x600/F59E0B/ffffff?text=Ceramic+Tile&quot;,
                &quot;cover_area&quot;: &quot;https://via.placeholder.com/600x400/F59E0B/ffffff?text=Cover+10pcs/m2&quot;,
                &quot;material&quot;: &quot;High quality ceramic&quot;,
                &quot;deskripsi_produk&quot;: &quot;Genteng keramik dengan finishing glazur. Tahan lama, tidak pudar, dan memberikan kesan mewah.&quot;,
                &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
                &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;
            }
        },
        {
            &quot;id&quot;: 9,
            &quot;series_id&quot;: 5,
            &quot;nama_product&quot;: &quot;Genteng Beton - Natural Grey&quot;,
            &quot;thumbnail&quot;: &quot;https://via.placeholder.com/300x300/6B7280/ffffff?text=Concrete&quot;,
            &quot;big_pic&quot;: &quot;https://via.placeholder.com/1200x800/6B7280/ffffff?text=Genteng+Beton&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;series&quot;: {
                &quot;id&quot;: 5,
                &quot;kategori_id&quot;: 3,
                &quot;nama_series&quot;: &quot;Rensa Genteng Beton&quot;,
                &quot;struktur_img&quot;: &quot;https://via.placeholder.com/800x600/10B981/ffffff?text=Concrete+Tile&quot;,
                &quot;cover_area&quot;: &quot;https://via.placeholder.com/600x400/10B981/ffffff?text=Cover+10pcs/m2&quot;,
                &quot;material&quot;: &quot;High strength concrete&quot;,
                &quot;deskripsi_produk&quot;: &quot;Genteng beton dengan kekuatan tinggi. Ekonomis dan tahan terhadap perubahan cuaca ekstrem.&quot;,
                &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
                &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;
            }
        },
        {
            &quot;id&quot;: 10,
            &quot;series_id&quot;: 5,
            &quot;nama_product&quot;: &quot;Genteng Beton - Terracotta&quot;,
            &quot;thumbnail&quot;: &quot;https://via.placeholder.com/300x300/D97706/ffffff?text=Terracotta&quot;,
            &quot;big_pic&quot;: &quot;https://via.placeholder.com/1200x800/D97706/ffffff?text=Genteng+Terracotta&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;series&quot;: {
                &quot;id&quot;: 5,
                &quot;kategori_id&quot;: 3,
                &quot;nama_series&quot;: &quot;Rensa Genteng Beton&quot;,
                &quot;struktur_img&quot;: &quot;https://via.placeholder.com/800x600/10B981/ffffff?text=Concrete+Tile&quot;,
                &quot;cover_area&quot;: &quot;https://via.placeholder.com/600x400/10B981/ffffff?text=Cover+10pcs/m2&quot;,
                &quot;material&quot;: &quot;High strength concrete&quot;,
                &quot;deskripsi_produk&quot;: &quot;Genteng beton dengan kekuatan tinggi. Ekonomis dan tahan terhadap perubahan cuaca ekstrem.&quot;,
                &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
                &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;
            }
        },
        {
            &quot;id&quot;: 11,
            &quot;series_id&quot;: 6,
            &quot;nama_product&quot;: &quot;Gypsum Board - Standard 9mm&quot;,
            &quot;thumbnail&quot;: &quot;https://via.placeholder.com/300x300/F3F4F6/1F2937?text=Gypsum+9mm&quot;,
            &quot;big_pic&quot;: &quot;https://via.placeholder.com/1200x800/F3F4F6/1F2937?text=Gypsum+Board+9mm&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;series&quot;: {
                &quot;id&quot;: 6,
                &quot;kategori_id&quot;: 4,
                &quot;nama_series&quot;: &quot;Rensa Gypsum Board&quot;,
                &quot;struktur_img&quot;: &quot;https://via.placeholder.com/800x600/3B82F6/ffffff?text=Gypsum+Board&quot;,
                &quot;cover_area&quot;: &quot;https://via.placeholder.com/600x400/3B82F6/ffffff?text=Cover+2.88m2&quot;,
                &quot;material&quot;: &quot;Gypsum core with paper liner&quot;,
                &quot;deskripsi_produk&quot;: &quot;Plafon gypsum berkualitas tinggi untuk interior modern. Permukaan halus dan mudah finishing.&quot;,
                &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
                &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;
            }
        },
        {
            &quot;id&quot;: 12,
            &quot;series_id&quot;: 6,
            &quot;nama_product&quot;: &quot;Gypsum Board - Standard 12mm&quot;,
            &quot;thumbnail&quot;: &quot;https://via.placeholder.com/300x300/F3F4F6/1F2937?text=Gypsum+12mm&quot;,
            &quot;big_pic&quot;: &quot;https://via.placeholder.com/1200x800/F3F4F6/1F2937?text=Gypsum+Board+12mm&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;series&quot;: {
                &quot;id&quot;: 6,
                &quot;kategori_id&quot;: 4,
                &quot;nama_series&quot;: &quot;Rensa Gypsum Board&quot;,
                &quot;struktur_img&quot;: &quot;https://via.placeholder.com/800x600/3B82F6/ffffff?text=Gypsum+Board&quot;,
                &quot;cover_area&quot;: &quot;https://via.placeholder.com/600x400/3B82F6/ffffff?text=Cover+2.88m2&quot;,
                &quot;material&quot;: &quot;Gypsum core with paper liner&quot;,
                &quot;deskripsi_produk&quot;: &quot;Plafon gypsum berkualitas tinggi untuk interior modern. Permukaan halus dan mudah finishing.&quot;,
                &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
                &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;
            }
        },
        {
            &quot;id&quot;: 13,
            &quot;series_id&quot;: 7,
            &quot;nama_product&quot;: &quot;PVC Ceiling - White&quot;,
            &quot;thumbnail&quot;: &quot;https://via.placeholder.com/300x300/FFFFFF/1F2937?text=PVC+White&quot;,
            &quot;big_pic&quot;: &quot;https://via.placeholder.com/1200x800/FFFFFF/1F2937?text=PVC+Ceiling+White&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;series&quot;: {
                &quot;id&quot;: 7,
                &quot;kategori_id&quot;: 4,
                &quot;nama_series&quot;: &quot;Rensa PVC Ceiling&quot;,
                &quot;struktur_img&quot;: &quot;https://via.placeholder.com/800x600/8B5CF6/ffffff?text=PVC+Ceiling&quot;,
                &quot;cover_area&quot;: &quot;https://via.placeholder.com/600x400/8B5CF6/ffffff?text=Cover+3m&quot;,
                &quot;material&quot;: &quot;UV resistant PVC&quot;,
                &quot;deskripsi_produk&quot;: &quot;Plafon PVC anti air dan mudah dibersihkan. Ideal untuk kamar mandi dan area basah.&quot;,
                &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
                &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;
            }
        },
        {
            &quot;id&quot;: 14,
            &quot;series_id&quot;: 7,
            &quot;nama_product&quot;: &quot;PVC Ceiling - Wood Pattern&quot;,
            &quot;thumbnail&quot;: &quot;https://via.placeholder.com/300x300/78350F/ffffff?text=PVC+Wood&quot;,
            &quot;big_pic&quot;: &quot;https://via.placeholder.com/1200x800/78350F/ffffff?text=PVC+Wood+Pattern&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;series&quot;: {
                &quot;id&quot;: 7,
                &quot;kategori_id&quot;: 4,
                &quot;nama_series&quot;: &quot;Rensa PVC Ceiling&quot;,
                &quot;struktur_img&quot;: &quot;https://via.placeholder.com/800x600/8B5CF6/ffffff?text=PVC+Ceiling&quot;,
                &quot;cover_area&quot;: &quot;https://via.placeholder.com/600x400/8B5CF6/ffffff?text=Cover+3m&quot;,
                &quot;material&quot;: &quot;UV resistant PVC&quot;,
                &quot;deskripsi_produk&quot;: &quot;Plafon PVC anti air dan mudah dibersihkan. Ideal untuk kamar mandi dan area basah.&quot;,
                &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
                &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;
            }
        },
        {
            &quot;id&quot;: 15,
            &quot;series_id&quot;: 8,
            &quot;nama_product&quot;: &quot;Wall Panel - Cream&quot;,
            &quot;thumbnail&quot;: &quot;https://via.placeholder.com/300x300/FEF3C7/1F2937?text=Panel+Cream&quot;,
            &quot;big_pic&quot;: &quot;https://via.placeholder.com/1200x800/FEF3C7/1F2937?text=Wall+Panel+Cream&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;series&quot;: {
                &quot;id&quot;: 8,
                &quot;kategori_id&quot;: 5,
                &quot;nama_series&quot;: &quot;Rensa Wall Panel&quot;,
                &quot;struktur_img&quot;: &quot;https://via.placeholder.com/800x600/EF4444/ffffff?text=Wall+Panel&quot;,
                &quot;cover_area&quot;: &quot;https://via.placeholder.com/600x400/EF4444/ffffff?text=Cover+2.4m2&quot;,
                &quot;material&quot;: &quot;Composite sandwich panel&quot;,
                &quot;deskripsi_produk&quot;: &quot;Panel dinding sandwich dengan insulasi thermal. Ringan, kuat, dan cepat dipasang.&quot;,
                &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
                &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-products" data-method="GET"
      data-path="api/products"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-products"
                    onclick="tryItOut('GETapi-products');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-products"
                    onclick="cancelTryOut('GETapi-products');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-products"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-stores">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-stores">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/stores" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/stores"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-stores">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;nama_toko&quot;: &quot;Rensa Store Jakarta Pusat&quot;,
            &quot;alamat&quot;: &quot;Jl. Gatot Subroto No. 123, Jakarta Pusat, DKI Jakarta 10270&quot;,
            &quot;link_maps&quot;: &quot;https://maps.google.com/?q=-6.2088,106.8456&quot;,
            &quot;kontak&quot;: &quot;021-5551234&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;nama_toko&quot;: &quot;Rensa Store Bandung&quot;,
            &quot;alamat&quot;: &quot;Jl. Asia Afrika No. 45, Bandung, Jawa Barat 40111&quot;,
            &quot;link_maps&quot;: &quot;https://maps.google.com/?q=-6.9175,107.6191&quot;,
            &quot;kontak&quot;: &quot;022-4447890&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;nama_toko&quot;: &quot;Rensa Store Surabaya&quot;,
            &quot;alamat&quot;: &quot;Jl. Basuki Rahmat No. 78, Surabaya, Jawa Timur 60271&quot;,
            &quot;link_maps&quot;: &quot;https://maps.google.com/?q=-7.2575,112.7521&quot;,
            &quot;kontak&quot;: &quot;031-3335678&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;nama_toko&quot;: &quot;Rensa Store Medan&quot;,
            &quot;alamat&quot;: &quot;Jl. Imam Bonjol No. 56, Medan, Sumatera Utara 20152&quot;,
            &quot;link_maps&quot;: &quot;https://maps.google.com/?q=3.5952,98.6722&quot;,
            &quot;kontak&quot;: &quot;061-4449012&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;nama_toko&quot;: &quot;Rensa Store Makassar&quot;,
            &quot;alamat&quot;: &quot;Jl. Ahmad Yani No. 89, Makassar, Sulawesi Selatan 90174&quot;,
            &quot;link_maps&quot;: &quot;https://maps.google.com/?q=-5.1477,119.4327&quot;,
            &quot;kontak&quot;: &quot;0411-3216789&quot;,
            &quot;created_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;,
            &quot;updated_at&quot;: &quot;2026-01-24T09:11:57+00:00&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-stores" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-stores"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-stores"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-stores" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-stores">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-stores" data-method="GET"
      data-path="api/stores"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-stores', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-stores"
                    onclick="tryItOut('GETapi-stores');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-stores"
                    onclick="cancelTryOut('GETapi-stores');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-stores"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/stores</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-stores"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-stores"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
