<!doctype html>
<html>
<head>
    <link rel="stylesheet" media="screen"
          href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.1/jquery.rateyo.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <meta name="viewport"
          content="user-scalable=no,width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1"/>
    <style>.rendered-form {
            padding: 10px;
        }</style>
    <title>Avatar FormBuilder</title></head>
<body style="background-color: #fff;">
<header class="demo-header">
{{--    <label for="toggleBootstrap">Toggle Bootstrap <input type="checkbox" id="toggleBootstrap"/></label>--}}
    <div style="display: none !important;">dataType: <label>XML <input type="radio" name="demo-dataType" value="xml"
                                     class="demo-dataType"/></label><label>JSON <input checked type="radio" name="demo-dataType"
                                                                                       value="json"
                                                                                       class="demo-dataType"/></label>
    </div>

{{--    <div>Language: <select id="setLanguage">--}}
{{--            <option value="ar-SA">سعودي</option>--}}
{{--            <option value="ar-TN">تونسي</option>--}}
{{--            <option value="ca-ES">català</option>--}}
{{--            <option value="cs-CZ">čeština</option>--}}
{{--            <option value="da-DK">Dansk</option>--}}
{{--            <option value="de-DE">Deutsch</option>--}}
{{--            <option value="el-GR">Ελληνικά (EL)</option>--}}
{{--            <option value="en-US">English (US)</option>--}}
{{--            <option value="es-ES">español</option>--}}
{{--            <option value="fa-IR">فارسى</option>--}}
{{--            <option value="fi-FI">suomen</option>--}}
{{--            <option value="fr-FR">français</option>--}}
{{--            <option value="he-IL">עברית‬</option>--}}
{{--            <option value="hu-HU">magyar</option>--}}
{{--            <option value="it-IT">italiano</option>--}}
{{--            <option value="ja-JP">日本語</option>--}}
{{--            <option value="my-MM">ဗမာစကာ</option>--}}
{{--            <option value="nb-NO">norsk</option>--}}
{{--            <option value="nl-NL">Nederlands</option>--}}
{{--            <option value="pl-PL">Polska</option>--}}
{{--            <option value="pt-BR">Português</option>--}}
{{--            <option value="qz-MM">ဗမာစကာ</option>--}}
{{--            <option value="ro-RO">român</option>--}}
{{--            <option value="ru-RU">Русский язык</option>--}}
{{--            <option value="sl-SI">Slovenščina (SI)</option>--}}
{{--            <option value="th-TH">ภาษาไทย</option>--}}
{{--            <option value="tr-TR">Türkçe</option>--}}
{{--            <option value="uk-UA">українська мова</option>--}}
{{--            <option value="vi-VN">tiếng Việt</option>--}}
{{--            <option value="zh-CN">简化字</option>--}}
{{--            <option value="zh-TW">台語</option>--}}
{{--        </select></div>--}}
</header>
<div class="content">
    <h1 class="formbuilder-title">jQuery formBuilder -
        <button class="editForm">Render</button>
    </h1>
    <h1 class="formrender-title">jQuery formRender -
        <button class="editForm">Edit</button>
        <button id="btnShow">Show UserData</button>
    </h1>
    <div class="build-wrap"></div>
    <form class="render-wrap"></form>
    <div class="action-buttons formbuilder-actions"><h2>Actions</h2>
        <table id="action-api" class="api-table"></table>
    </div>
    <div class="action-buttons formrender-actions"><h2>Actions</h2>
        <table id="demo-api" class="api-table"></table>
    </div>
</div>
<div id="formbuilder-options"></div>
<span id="spanResult"></span>
<script src="{{asset('form/vendor.js')}}"></script>
<script src="{{asset('form/form-builder.min.js')}}"></script>
<script src="{{asset('form/form-render.min.js')}}"></script>
<script src="{{asset('form/demo.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.1/jquery.rateyo.min.js"></script>
</body>
</html>
