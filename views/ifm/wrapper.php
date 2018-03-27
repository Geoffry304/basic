
<?php
/* @var $this yii\web\View */

$alias = Yii::getAlias("@webroot");
require_once ("$alias\libifm.php");
$IFM = new IFM();
// inline mode just inserts a div with the ID and inserts all needed
// javascript
$IFM->run("inline");  

//$js = "console.log('test')";
//$js = "var ifm = new IFM({ \"api\": \"apiwrapper?path=$path\" }); ifm.init( \"ifm\" );";
//$this->registerJs($js);

// \mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos' => \yii\web\View::POS_END,
//     'viewParams' => [
//         'path' => $path,
//     ]
// ]);
?>
<script type="text/javascript">
    console.log("test");
    var ifm = new IFM({ "api": "apiwrapper?path=<?= $path ?>" });
    ifm.init( "ifm" );
</script>






