<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "�������");
$APPLICATION->SetPageProperty("keywords_inner", "�������");
$APPLICATION->SetPageProperty("title", "�������");
$APPLICATION->SetTitle("�������");
?> 

<?$APPLICATION->IncludeFile(
														$APPLICATION->GetCurDir()."content/new.php",
														Array(),
														Array("MODE"=>"html")
														);
													?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>