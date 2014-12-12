<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "Новинки");
$APPLICATION->SetPageProperty("keywords_inner", "Новинки");
$APPLICATION->SetPageProperty("title", "Новинки");
$APPLICATION->SetTitle("Новинки");
?> 

<?$APPLICATION->IncludeFile(
														$APPLICATION->GetCurDir()."content/new.php",
														Array(),
														Array("MODE"=>"html")
														);
													?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>