<h2><?php echo $aktivniInstance->id; ?></h2>

<form action="" method="post">
    <label for="">ID</label>
    <input type="text" value="<?php echo $aktivniInstance->id; ?>" name="id-stranky" id="">
    <br>
    <label for="">Titulek</label>
    <input type="text" value="<?php echo $aktivniInstance->titulek; ?>"  name="titulek-stranky" id="">
    <br>
    <label for="">Menu</label>
    <input type="text" value="<?php echo $aktivniInstance->menu; ?>"  name="menu-stranky" id="">
    <br>
    <label for="">Obrazek</label>
    <input type="text" value="<?php echo $aktivniInstance->obrazek; ?>"  name="obrazek-stranky" id="">
    <br>
    <label for="">Obsah</label>
    <textarea name="obsah-stranky" id="klokan"><?php
        echo htmlspecialchars($aktivniInstance->getObsah());
    ?></textarea>
    <button type="submit" name="aktualizovat-submit">Aktualizovat web</button>
</form>

<!--pripojení knihovny tinymce -->
<script src="./vendor/tinymce/tinymce/tinymce.js"></script>

<!-- tento script knihovnu tinymce aktivuje -->
<script>
    tinymce.init({
        selector: "#klokan",
        content_css: ["./css/all.min.css", "./css/style.css"],
        verify_html: false,
        entity_encoding: "raw",
        plugins: 'advlist anchor autolink charmap code colorpicker contextmenu directionality emoticons fullscreen hr image imagetools insertdatetime link lists nonbreaking noneditable pagebreak paste preview print save searchreplace tabfocus table textcolor textpattern visualchars',
        toolbar1: "insertfile undo redo | styleselect | fontselect | fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor",
        toolbar2: "link unlink anchor | fontawesome | image media | responsivefilemanager | preview code",
        external_plugins: {
			'responsivefilemanager': '<?php echo dirname($_SERVER['PHP_SELF']); ?>/vendor/primakurzy/responsivefilemanager/tinymce/plugins/responsivefilemanager/plugin.min.js',
			'filemanager': '<?php echo dirname($_SERVER['PHP_SELF']); ?>/vendor/primakurzy/responsivefilemanager/tinymce/plugins/filemanager/plugin.min.js',
		},
		external_filemanager_path: "<?php echo dirname($_SERVER['PHP_SELF']); ?>/vendor/primakurzy/responsivefilemanager/filemanager/",
		filemanager_title: "File manager",

    });
</script>
