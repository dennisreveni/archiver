<?
	error_reporting(E_ALL);
	define('VERSION', '201429042352');
	date_default_timezone_set('Europe/Kiev');
	session_start();
	//set_time_limit(2);
	$timestart = microtime(1);
	//$pass = '238a0fa7c18cd78ca1f8d14c260ee02b';
	$pass = 'b59c67bf196a4758191e42f76670ceba';
	$url = preg_replace('/\?.*/','',$_SERVER['REQUEST_URI']);
	if(isset($lastvers)) $_SESSION['message']['NOTICE'][] = $lastvers;
	
	$log_file = 'archive.log';
	$pathname = getcwd();
?>
<? #--- массив перекладів ------------------------------------------------
	$lang = array(
		'ua' => array(
			'language' => 'Мова',
			'file_not' => 'Не знайдено файл ',
			'kamikadze_ok' => 'Самознищення пройшло вдало.',
			'kamikadze_err' => 'файл не знищено. В доступі відмовлено.',
			'your_vers' => 'Ваша версія',
			'not_new' => 'архіватору не є найновішою',
			'arch' => 'Архів',
			'unzip_ok' => 'успішно розархівовано в директорію ',
			'unzip_err' => 'Пошкоджено архів',
			'unzip_not' => 'Архів не знайдено',
			'unzip_choose' => 'Виберіть файл для розархівування',
			'unzip' => 'Розархівувати',
			'unzip_log' => 'Хід виконання',
			'dell' => 'Видалити',
			'delzip_ok' => 'Успішно видалено архів.',
			'delzip_err' => 'Не видалено архів',
			'delzip_choose' => 'Виберіть файл для видалення',
			'all_files' => 'Усі файли та теки',
			'show_dir_count_files' => 'Показати точну кількість файлів у теках.(Це займе деякий час...)',
			'more_999' => 'більше 999 файлів',
			'add_folder_err' => 'ПОМИЛКА архівації: додавання порожної теки',
			'add_file_err' => 'ПОМИЛКА архівації: додавання файлу',
			'skip' => 'Пропущений',
			'permission' => 'Архів не створено. Немає прав на запис',
			'zip_created' => 'Створено архів',
			'zip_added_files' => 'До архіву додано файлів',
			'many' => ' багацько',
			'choose_folder' => 'Виберіть теку',
			'full_files' => 'Всього файлів',
			'count_files' => 'Кількість файлів',
			'show_full_count_files' => 'Показати кількість файлів.(Це займе деякий час...)',
			'unziper' => 'Розархіватор',
			'zip_found' => 'Знайдені архіви (тільки zip формату)',
			'zip_not_found' => 'Не знайдено жодного zip архіву',
			'zipsite' => 'Архіватор',
			'choose_zip' => 'Виберіть архів',
			'create_new_zip' => 'Створити новий архів',
			'add_to_zip' => 'Доповнити архів',
			'choose_dir' => 'Виберіть директорію для архівування',
			'enter_subdir' => 'Або впишіть шлях до вкладеної теки: (Наприклад: "bitrix/upload")',
			'dir_exeption' => 'Які теки слід виключити: вводити через "|"',
			'dont_zip_more' => 'Не архівувати файли більше ніж',
			'zip_max_files_count' => 'Обмеження за кількістю файлів',
			'start' => 'РОЗПОЧАТИ АРХІВАЦІЮ',
			'kamikadze' => 'видалити archiver',
			'zip_log' => 'Хід виконання архівації',
			'page_gen' => 'Cторінка згенерована за',
			'sec' => 'секунд',
			'enter_pass' => 'Введіть пароль',
			'login' => 'вхід',
			'zip_sorry' => 'Шановний користувач архіватору.<br /> На жаль на цьому хостингу не встановлений ZIP архіватор.',
			'show_log' => 'Відображення повідомлень',
			'show_log_ok' => 'Успішні',
			'show_log_notice' => 'Пропущені',
			'show_log_error' => 'Помилки',
			'show_log_save' => 'Зберегти',
			'access_denied' => 'Доступ не надано.',
			'shots' => 'Залишилось',
			'left' => 'спроб',
			'check_new_vers_err' => 'Не вдалось перевірити нову версію',
			'develop' => 'Розробив',
			'settings_saved' => 'Налаштування збережені',
			'settings' => 'Налаштування',
			'create_arch' => 'Створити Архів',
			'extract_arch' => 'Витягти із Архіву',
			'file_manager' => 'Файловий Менеджер',
			'exit' => 'Вихід',
			'files_&_dirs_in' => 'Файли та теки в директорії',
			'from' => 'від',
			'to' => 'до',
			'limit' => 'по',
			'ajax_load_step' => 'файлів за прохід',
			'show_confirm_window' => 'Запитувати підтвердження для',
			'unziping_arch' => 'Розархівування',
			'deleting_arch' => 'Видалення архіву',
			'fm_t_name' => 'Назва',
			'fm_t_count' => 'Кількість',
			'fm_t_size' => 'Розмір',
			'fm_t_permission' => 'Атрибути',
			'show_full_size_dir' => 'Показати розмір тек.(Це займе деякий час...)',
			'size_files' => 'Підрахунок розміру тек',
			'totally' => 'Загалом',
			'download_new' => 'Завантажте останню версію: ',
			'delete_confirm' => 'Ви дійсно хочете видалити цей архів?',
			'extract_confirm' => 'Ви дійсно хочете розархівувати цей архів?',
		),
		'en' => array(
			'language' => 'Language',
			'file_not' => 'File not found ',
			'kamikadze_ok' => 'Destroy itself successfully completed.',
			'kamikadze_err' => 'File don`t destroy. Permission denied.',
			'your_vers' => 'Your version',
			'not_new' => 'archivator is not newest',
			'arch' => 'Archive',
			'unzip_ok' => 'Successfully extracted in directory ',
			'unzip_err' => 'Archive broken',
			'unzip_not' => 'Archive not found',
			'unzip_choose' => 'Choose file to extract',
			'unzip' => 'Extract',
			'unzip_log' => 'Log',
			'dell' => 'Delete',
			'delzip_ok' => 'Successfully deleted archive.',
			'delzip_err' => 'Archive was not deleted',
			'delzip_choose' => 'Choose file to delete',
			'all_files' => 'All files and directories',
			'show_dir_count_files' => 'Show exact count files in directories.(It will take some time...)',
			'more_999' => 'more than 999 files',
			'add_folder_err' => 'ERROR archivation: adding empty dir',
			'add_file_err' => 'ERROR archivation: adding file',
			'skip' => 'Skiped',
			'permission' => 'Archive will not created. Permission denied',
			'zip_created' => 'Archive will created',
			'zip_added_files' => 'filed added',
			'many' => ' many',
			'choose_folder' => 'Choose directory',
			'count_files' => 'Count files',
			'full_files' => 'All files',
			'show_full_count_files' => 'Show count files.(It will take some time...)',
			'unziper' => 'Site Extractor',
			'zip_found' => '',
			'zip_found' => 'Found archives (only zip format)',
			'zip_not_found' => 'Not found any zip archive',
			'zipsite' => 'Site Archivator',
			'choose_zip' => 'Choose archive',
			'create_new_zip' => 'Create a new archive',
			'add_to_zip' => 'Archive supplement',
			'choose_dir' => 'Choose dir to archivation',
			'enter_subdir' => 'Or enter path to subdir: (Example: "bitrix/upload")',
			'dir_exeption' => 'Skiped dir: enter with delimiter "|"',
			'dont_zip_more' => 'Do not archive files bigger more than',
			'zip_max_files_count' => 'Limit on the number of files',
			'start' => 'START ARCHIVATION',
			'kamikadze' => 'delete archiver',
			'zip_log' => 'Log archivation',
			'page_gen' => 'Page generate in',
			'sec' => 'second',
			'enter_pass' => 'Enter password',
			'login' => 'enter',
			'zip_sorry' => 'Dear user archiver. <br /> Unfortunately this host is not established ZIP archive.',
			'show_log' => 'Show log settings',
			'show_log_ok' => 'Success',
			'show_log_notice' => 'Skiped',
			'show_log_error' => 'Error',
			'show_log_save' => 'Save',
			'access_denied' => 'Access denied.',
			'shots' => 'Shots',
			'left' => 'left',
			'check_new_vers_err' => 'Can not check new version',
			'develop' => 'Developer',
			'settings_saved' => 'Settings saved',
			'settings' => 'Settings',
			'create_arch' => 'Create Archive',
			'extract_arch' => 'Extract Archive',
			'file_manager' => 'File Manager',
			'exit' => 'Exit',
			'files_&_dirs_in' => 'Files & folders in directory',
			'from' => 'from',
			'to' => 'to',
			'limit' => 'limit',
			'ajax_load_step' => 'files by step',
			'show_confirm_window' => 'Show confirm window for',
			'unziping_arch' => 'Unziping archive',
			'deleting_arch' => 'Deleting archive',
			'fm_t_name' => 'Name',
			'fm_t_count' => 'Count',
			'fm_t_size' => 'Size',
			'fm_t_permission' => 'Permission',
			'show_full_size_dir' => 'Show full size dir',
			'size_files' => 'Calculate file size',
			'totally' => 'Totally',
			'download_new' => 'Download new version: ',
			'delete_confirm' => 'Are you sure you want delete this archive?',
			'extract_confirm' => 'Are you sure you want extract this archive?',
		),
		'ru' => array(
			'language' => 'Язык',
			'file_not' => 'Не найдено файл',
			'kamikadze_ok' => 'Самоуничтожение прошло удачно.',
			'kamikadze_err' => 'файл не уничтожено. В доступе отказано.',
			'your_vers' => 'Ваша версия',
			'not_new' => 'архиватора не является новейшей',
			'arch' => 'Архив',
			'unzip_ok' => 'успешно извлечен в директорию',
			'unzip_err' => 'Поврежден архив',
			'unzip_not' => 'Архив не найден',
			'unzip_choose' => 'Выберите файл для разархивирования',
			'unzip' => 'Разархивировать',
			'unzip_log' => 'Ход выполнения',
			'dell' => 'Удалить',
			'delzip_ok' => 'Успешно удалено архив.',
			'delzip_err' => 'Не было удалено архив',
			'delzip_choose' => 'Выберите файл для удаления',
			'all_files' => 'Все файлы и папки',
			'show_dir_count_files' => 'Показать точное количество файлов в папках. (Это займет некоторое время ...)',
			'more_999' => 'более 999 файлов',
			'add_folder_err' => 'Ошибка архивации Добавление пустые папки',
			'add_file_err' => 'Ошибка архивации: добавление файла',
			'skip' => 'Пропущенный',
			'permission' => 'Архив не создан. Нет прав на запись',
			'zip_created' => 'Создан архив',
			'zip_added_files' => 'В архив добавлено файлов',
			'many' => 'множество',
			'choose_folder' => 'Выберите папку',
			'count_files' => 'Количество файлов',
			'full_files' => 'Всего файлов',
			'show_full_count_files' => 'Показать количество файлов. (Это займет некоторое время ...)',
			'unziper' => 'Розархиватор сайта',
			'zip_found' => 'Найденные архивы (только zip формат)',
			'zip_not_found' => 'Не нойдено ни одного архіва zip формата',
			'zipsite' => 'Архиватор сайта',
			'choose_zip' => 'Выберите архив',
			'create_new_zip' => 'Создать архив',
			'add_to_zip' => 'Дополнить архив',
			'choose_dir' => 'Выберите директорию для архивирования',
			'enter_subdir' => 'Или впишите путь к вложенной папки (Например: "bitrix / upload")',
			'dir_exeption' => 'Какие папки следует исключить: вводить через "|"',
			'dont_zip_more' => 'Не архивировать файлы более',
			'zip_max_files_count' => 'Ограничения по количеству файлов',
			'start' => 'НАЧАТЬ АРХИВАЦИЮ',
			'kamikadze' => 'удалить архиватор',
			'zip_log' => 'Ход выполнения архивации',
			'page_gen' => 'Страница сгенерирована за',
			'sec' => 'секунд',
			'enter_pass' => 'Введите пароль',
			'login' => 'вход',
			'zip_sorry' => 'Уважаемый пользователь архиватора. <br /> К сожалению на этом хостинге не установлен ZIP архиватор.',
			'show_log' => 'Отображение уведомлений',
			'show_log_ok' => 'Успешные',
			'show_log_notice' => 'Пропущеные',
			'show_log_error' => 'Ошибки',
			'show_log_save' => 'Сохранить',
			'access_denied' => 'Доступ запрещен.',
			'shots' => 'Осталось',
			'left' => 'попыток',
			'check_new_vers_err' => 'Не удалось проверить новую версию',
			'develop' => 'Разработано',
			'settings_saved' => 'Настройки сохранены',
			'settings' => 'Настройки',
			'create_arch' => 'Создать Архив',
			'extract_arch' => 'Извлечь из Архива',
			'file_manager' => 'Файловый Менеджер',
			'exit' => 'Выход',
			'files_&_dirs_in' => 'Файлы и папки в директории',
			'from' => 'от',
			'to' => 'до',
			'limit' => 'по',
			'ajax_load_step' => 'файлов за проход',
			'show_confirm_window' => 'Запрашивать подтверждение для',
			'unziping_arch' => 'Разархивации',
			'deleting_arch' => 'Удаления архива',
			'fm_t_name' => 'Название',
			'fm_t_count' => 'Количество',
			'fm_t_size' => 'Размер',
			'fm_t_permission' => 'Атрибуты',
			'show_full_size_dir' => 'Показать точный размер папок(Это займет некоторое время ...)',
			'size_files' => 'Подсчет размеров папок',
			'totally' => 'Всего',
			'download_new' => 'Скачайте последнюю версию: ',
			'delete_confirm' => 'Вы действительно хотите удалить этот архив?',
			'extract_confirm' => 'Вы действительно хотите разархивировать этот архив?',
		)
	);
	#--- /массив перекладів -------------------------------------------------------
?>
<? # ФУНКЦІЇ -------------------------------------------------------------
	
	# функція визначення змінних -----------------------------------------
	function init(){
		if(!isset($_GET['get_count'])) $_GET['get_count'] = null;
		if(!isset($_GET['get_size'])) $_GET['get_size'] = null;
		if(!isset($_GET['logout'])) $_GET['logout'] = null;
		if(!isset($_GET['section'])) $_GET['section'] = null;
		if(!isset($_GET['fmdir'])) $_GET['fmdir'] = null;
		if(!isset($_POST['gopass'])) $_POST['gopass'] = null;
		if(!isset($_POST['dir'])) $_POST['dir'] = null;
		if(!isset($_POST['dir_write'])) $_POST['dir_write'] = null;
		if(!isset($_POST['exept'])) $_POST['exept'] = array('');
		if(!isset($_POST['submit'])) $_POST['submit'] = null;
		if(!isset($_POST['unzip'])) $_POST['unzip'] = null;
		if(!isset($_POST['delzip'])) $_POST['delzip'] = null;
		if(!isset($_POST['pswrd'])) $_POST['pswrd'] = null;
		if(!isset($_POST['log_submit'])) $_POST['log_submit'] = null;
		if(!isset($_POST['show_ok'])) $_POST['show_ok'] = null;
		if(!isset($_POST['show_notice'])) $_POST['show_notice'] = null;
		if(!isset($_POST['show_error'])) $_POST['show_error'] = null;
		if(!isset($_POST['ajax'])) $_POST['ajax'] = null;
		if(!isset($_POST['skipfiles'])) $_POST['skipfiles'] = null;
		if(!isset($_POST['confirm_unzip'])) $_POST['confirm_unzip'] = null;
		if(!isset($_POST['confirm_delzip'])) $_POST['confirm_delzip'] = null;
		if(!isset($_SESSION['options']['min'])) $_SESSION['options']['min'] = 0;
		if(!isset($_SESSION['options']['max'])) $_SESSION['options']['max'] = 999999;
		if(!isset($_SESSION['options']['max_size'])) $_SESSION['options']['max_size'] = 1024;
		if(!isset($_SESSION['pass_count'])) $_SESSION['pass_count'] = 3;
		if(!isset($_SESSION['psswrd'])) $_SESSION['psswrd'] = null;
		if(!isset($_SESSION['hist']['OK'])) $_SESSION['hist']['OK'] = 1;
		if(!isset($_SESSION['hist']['NOTICE'])) $_SESSION['hist']['NOTICE'] = 1;
		if(!isset($_SESSION['hist']['ERROR'])) $_SESSION['hist']['ERROR'] = 1;
		if(!isset($_SESSION['message'])) $_SESSION['message'] = array('ERROR' => array(), 'NOTICE' => array(), 'OK' => array());
		if(!isset($_SESSION['history'])) $_SESSION['history'] = array();
		if(!isset($_SESSION['options']['min_orig'])) $_SESSION['options']['min_orig'] = null;
		if(!isset($_SESSION['options']['max_orig'])) $_SESSION['options']['max_orig'] = null;
		if(!isset($_SESSION['options']['files_for_iteration'])) $_SESSION['options']['files_for_iteration'] = 1000;
		if(!isset($_SESSION['options']['confirm_unzip'])) $_SESSION['options']['confirm_unzip'] = 1;
		if(!isset($_SESSION['options']['confirm_delzip'])) $_SESSION['options']['confirm_delzip'] = 1;
	}
	
	# функція визначення мови --------------------------------------------
	function set_lang(){
		if(isset($_GET['lang']))
			$_SESSION['lang'] = $_GET['lang'];
		elseif(!isset($_SESSION['lang']))
			$_SESSION['lang'] = 'ua';
		
		return $_SESSION['lang'];
	}
	
	# функція видалення файлу архівера -----------------------------------
	function kamikadze(){
		global $l, $lang;
		
		unset($_SESSION);
		if(unlink(__FILE__))
			exit(trnslt('kamikadze_ok'));
		else
			exit(trnslt('kamikadze_err'));
	}
	
	# функція перекладу --------------------------------------------------
	function trnslt($key){
		global $lang;
		$l = $_SESSION['lang'];
		if($lang[$l][$key])
			return $lang[$l][$key];
		else
			return $key;
	}
	
	# функція перевірки нової версії -------------------------------------
	function check_new_vers($vers){
		ini_set('default_socket_timeout', 2);
		error_reporting(E_ERROR);
		if($last_ver = file_get_contents('http://lesyuk-serg.w.pw/archiver/checker.php?curr='.$vers)){
			if(strlen($last_ver) > strlen((int)$last_ver)+2)
				$_SESSION['message']['NOTICE'][] = trnslt('download_new').$last_ver;
		} else {
			$_SESSION['message']['ERROR'][] = trnslt('check_new_vers_err');
		}
	}
	
	# Підрахунок всіх файлів в корені (по версії Армема Вилкова) ---------
	function getFolderCount($dir, &$cnt = 0){
		if(!$_GET['get_count'] && $cnt>999) return $cnt;
		
		if($dirs = scandir($dir)){
			unset(
				$dirs[array_search('.',$dirs)],
				$dirs[array_search('..',$dirs)],
				$dirs[array_search('.git',$dirs)],
				$dirs[array_search('archive.log',$dirs)]
			);
			if(current($dirs)){
				do{
					if (is_file($dir.'/'.current($dirs))){
						$cnt++;
					}else{
						getFolderCount($dir.'/'.current($dirs), $cnt);
					}
				}while(next($dirs));
			}
		}
		return $cnt;
	}
	
	# Підрахунок всіх розмірів файлів в теках ----------------------------
	function getFolderSize($dir, &$cnt = 0){
		if(!$_GET['get_size'] && $cnt>9) return 0;
		
		if($dirs = scandir($dir)){
			unset(
				$dirs[array_search('.',$dirs)],
				$dirs[array_search('..',$dirs)],
				$dirs[array_search('.git',$dirs)],
				$dirs[array_search('archive.log',$dirs)]
			);
			$size = 0;
			if(current($dirs)){
				do{
					if (is_file($dir.'/'.current($dirs))){
						$size += filesize($dir.'/'.current($dirs));
						$cnt++;
					}else{
						$size += getFolderSize($dir.'/'.current($dirs), $cnt);
					}
				}while(next($dirs));
			}
		}
		return $size;
	}
	
	# Підрахунок файлів для архівації ------------------------------------
	function getFolderCount_for_ajax($dir, &$cnt = 0){
		if($dirs = scandir($dir)){
			unset(
				$dirs[array_search('.',$dirs)],
				$dirs[array_search('..',$dirs)],
				$dirs[array_search('.git',$dirs)],
				$dirs[array_search('archive.log',$dirs)],
				$dirs[array_search(basename(__FILE__),$dirs)]
			);
			if(current($dirs)){
				do{
					$file = current($dirs);
					if (is_file($dir.'/'.$file)){
						if(filesize($dir.'/'.$file) < $_SESSION['options']['max_size']*1024)
							$cnt++;
					}else{
						if(!in_array($file, $_POST['exept']))
							getFolderCount_for_ajax($dir.'/'.$file, $cnt);
					}
				}while(next($dirs));
			}
		}
		return $cnt;
	}

	# перевірка в root каталозі на zip файли -----------------------------
	function check_for_archive($archive_dir, $dirs){
		$deleted_zip = '';
		if($_POST['delzip']) $deleted_zip = $_POST['zipfile'];
		
		$zips = array();
		foreach($dirs as $dir){
			if (!is_dir($archive_dir.$dir) && strstr($dir, 'zip') && $dir != $deleted_zip){
				$zips[] = $dir;
			}
		}
		return $zips;
	}

	# функція розархівації -----------------------------------------------
	function unzippp($archive_dir, $zpfl){
		global $l, $lang;
		
		if($zpfl){
			$zipfile = $archive_dir.'/'.$zpfl;

			if(file_exists($zipfile)){
				$zip = new ZipArchive;
				$res = $zip->open($zipfile);
				if ($res === TRUE){
					$num = $zip->numFiles;
					$zip->extractTo($archive_dir);
					$zip->close();
					
					$_SESSION['message']['OK'][] = trnslt('arch').' <b>'.$zpfl.'</b> '.trnslt('unzip_ok').' '.$archive_dir.'.';
				}else{
					$_SESSION['message']['ERROR'][] = trnslt('unzip_err').' <b>'.$zpfl.'</b>';
				}
			}else{
				$_SESSION['message']['ERROR'][] = trnslt('unzip_not');
			}
		}else{
			$_SESSION['message']['ERROR'][] = trnslt('unzip_choose');
		}
	}
	
	# функція видалення архіву -------------------------------------------
	function delzippp($archive_dir, $zpfl){
		if($zpfl){
			$zipfile = $archive_dir.'/'.$zpfl;

			if(file_exists($zipfile)){
				if (unlink($zipfile)){
					$_SESSION['message']['OK'][] = trnslt('delzip_ok').' <b>'.$zpfl.'</b>';
				}else{
					$_SESSION['message']['ERROR'][] = trnslt('delzip_err').' <b>'.$zpfl.'</b>';
				}
			}else{
				$_SESSION['message']['ERROR'][] = trnslt('unzip_not');
			}
		}else{
			$_SESSION['message']['ERROR'][] = trnslt('delzip_choose');
		}
	}
	
	# показ та функціонал вибору тек в root директорії -------------------
	function show_root_dir($src_dir, $dirs){
		global $lang, $l;
		$out = '<script>';
		if(!$_GET['get_count'])
			$out .= 'document.getElementById("get_count").checked = false;';

		$out .= "
			function turn_of(alldir){
				if(alldir.checked){
					var f1 = document.getElementsByTagName('input');
					for (var i=0; i<f1.length; i++)
						if (f1[i].className == 'selecteddir')
							f1[i].checked = false;
				}
			}";
		$out .= '</script>';
		$out .= "<input id='alldir' type='checkbox' name='dir' value='' onclick='turn_of(this)' /> <b>".trnslt('all_files')."</b> <input type='checkbox' name='get_count' value='all' ".(($_GET['get_count']=='all' && !$_POST['submit'])?"checked='checked'":"")." onclick='if(get_count.checked)window.location=\"".preg_replace("/\?.*/","",$_SERVER['REQUEST_URI'])."?get_count=all\"; else window.location=\"".$_SERVER['SCRIPT_NAME']."\"' />".trnslt('show_dir_count_files')."<br />";

		foreach($dirs as $dir){
			if (is_dir($src_dir.$dir)){
				$all_count = 0;
				if(!$_POST['submit'] && $_GET['get_count'] !=1){
					$all_count = getFolderCount($src_dir.$dir.'/');
					//addFolderCount($src_dir.$dir.'/', $all_count);
				}
				$dir = iconv('cp1251', 'UTF-8', $dir);
				$out .= '<input class="selecteddir" type="checkbox" name="dir['.$dir.']" value="'.$dir.'" onclick="alldir.checked=false" /> '.$dir.' ('.(($all_count>1000 && $_GET['get_count']!='all')?trnslt('more_999'):$all_count).')<br />';
			}
		}
		return $out;
	}
	
	# показ тек та файлів в $src_dir директорії --------------------------
	function show_root_dir_and_files($src_dir, $sub){
		global $lang, $l;
		/* 
		if(strstr($sub, '..')){
			$sub = '';
			$src_dir = getcwd().'/';
		}
		*/
		$dirs = scandir($src_dir);
		$out = '';
		$total_count = 0;
		$total_size = 0;
		unset($dirs[array_search('.',$dirs)]);

		$dirs_out = array();
		$files_out = array();
		foreach($dirs as $dir){
			if (is_dir($src_dir.$dir)){
				$dirs_out[] = $dir;
			} else {
				$files_out[] = $dir;
			}
		}
		
		$out = '<table class="file_mamger_table">';
		$out .= '<tr><th>'.trnslt('fm_t_name').'</th><th>'.trnslt('fm_t_count').'</th><th>'.trnslt('fm_t_size').'</th><th>'.trnslt('fm_t_permission').'</th></tr>';
		$up = '';
		foreach($dirs_out as $dir){
			$dirperm = substr(sprintf('%o', fileperms($src_dir.'/'.$dir)), -4);
			$all_count = 0;
			$fsize = 0;
			if($dir == '..'){
				$pos = strrpos($sub, '/');
				if ($pos)
					$up = substr($sub, 0, $pos);
				else
					if(!$sub)
						continue;
				
				$dirname = '<a href="?section=filemanager&fmdir='.$up.'">'.$dir.'</a>';
			} else {
				$all_count = (!$_GET['get_size'])?getFolderCount($src_dir.$dir.'/'):0;
				$fsize = 0;
				if($_GET['get_size'])
					$fsize = getFolderSize($src_dir.$dir.'/', $all_count);
					
				$dir = iconv('cp1251', 'UTF-8', $dir);
				$dirname = '<a href="?section=filemanager&fmdir='.($sub?($sub.'/'):'').$dir.'">'.$dir.'</a>';
			}
		
			$total_count += $all_count;
			$total_size += $fsize;
			
			$count = ($all_count>1000 && !$_GET['get_size'])?trnslt('more_999'):$all_count;
			$fsize = (!$_GET['get_size'])?'~~~':number_format($fsize, 0, ',', ' ');
			
			$out .= '<tr><td>'.$dirname.'</td><td class="count">'.$count.'</td><td class="size">'.$fsize.' b</td><td class="size">'.$dirperm.'</td></tr>';
		}
		
		foreach($files_out as $file){
			$dirperm = substr(sprintf('%o', fileperms($src_dir."/".$dir)), -4);
			$size = filesize($src_dir.$file);
			$total_count++;
			$total_size += $size;
			
			$size = number_format($size, 0, ',', ' ');
			$file = iconv('cp1251', 'UTF-8', $file);
			
			$out .= '<tr><td>'.$file.'</td><td class="count"></td><td class="size">'.$size.' b</td><td class="size">'.$dirperm.'</td></tr>';
		}
		$total_size = number_format($total_size, 0, ',', ' ');
		$aprox = '';
		if(!$_GET['get_size']) $aprox = '>';
		
		$out .= '<tr><td colspan=4><hr /><hr /><hr /></td></tr>';
		$out .= '<tr><td><b>'.trnslt('totally').'</b></td><td class="count"><b>'.$aprox.' '.$total_count.'</b></td><td class="size"><b>'.$aprox.' '.$total_size.' b</b></td><td></td></tr>';
		$out .= '</table>';
		
		return $out;
	}

	# Рекурсивна функція архівації вкладених файлів і тек ----------------
	function addFolderToZip($dir, &$zipArchive, $zipdir = '', &$cnt, &$fp){		
		if (is_dir($dir)){
			fwrite($fp, $dir.'\n');

			if ($dh = opendir($dir)){
				if($cnt > $_SESSION['options']['min']){
					# Додаємо порожню директорію
					if(!empty($zipdir)){
						$zdir = $zipdir;
						if($zipArchive->addEmptyDir($zdir) === false){
							if($_SESSION['hist']['ERROR'])
								$_SESSION['history'][] = '<span class="red">'.trnslt('add_folder_err').' - '.$zdir.'</span><br />\n';
						}else{
							if($_SESSION['hist']['OK'])
								$_SESSION['history'][] = '<b>'.$zdir.'</b><br />';
						}
					}
				}

				#  цикл по всім файлам
				while(($file = readdir($dh))){
					if(is_dir($dir.$file)){
						# пропуск директорій '.' і '..'
						if(!in_array($file, $_POST['exept']) && $file != '.git'){
							$zfile = $file;
							addFolderToZip($dir.$file.'/', $zipArchive, $zipdir.$zfile . '/', $cnt, $fp);
						}
					}else{
						# якщо cnt більше max то зупинка 
						if($cnt >= $_SESSION['options']['max']){
							break;
						}
						# якщо cnt більше max то зупинка 
						if($file !== basename(__FILE__)){
							if($cnt > $_SESSION['options']['min']){
								if(filesize($dir.$file) < $_SESSION['options']['max_size']*1024 && $file != 'archive.log'){
									$zfile = iconv(mb_detect_encoding($file), 'CP866//TRANSLIT//IGNORE', $file);

									if($zipArchive->addFile($dir.$file, $zipdir.$zfile)){
										if($_SESSION['hist']['OK'])
											$_SESSION['history'][] = '<span class="green">'.(1000000+$cnt).' - '.$dir.$file.' OK</span><br />\n';
									}else{
										if($_SESSION['hist']['ERROR'])
											$_SESSION['history'][] = '<span class="red">'.trnslt('add_file_err').' '.$dir.$file.'</span><br />\n';
									}
									
									fwrite($fp, (1000000+$cnt).' - '.$dir.$file.' OK\n');
								}else{
									if($_SESSION['hist']['NOTICE'])
										$_SESSION['history'][] = '<span class="grey">'.$dir.$file.' - '.trnslt('skip').'</span><br />\n';
									
									fwrite($fp, $dir.$file.' - '.trnslt('skip').'\n');
								}
							}
							$cnt++;
						}
					}
				}
				closedir($dh);
			}
		}
	}

	# головна функція підготовки до архівації ----------------------------
	function start_archivation($pathname, $log_file){
		if($_POST['dir_write']){
			unset($_POST['dir']);
			$_POST['dir'] = $_POST['dir_write'];
		}
		
		if($_POST['exept']){
			$_POST['exept'] = explode('|',$_POST['exept']);
		}
		$_POST['exept'][] = '.';
		$_POST['exept'][] = '..';

		if(isset($_POST['dir'])){
			# створення zip архіву
			$zip = new ZipArchive();

			if(is_array($_POST['dir']) && isset($_POST['dir'][0]) && $_POST['dir'][0] == ''){
				$_POST['dir'] = '';
			}
			# ім'я архіва
			if($_POST['addtozip'] == 'new'){
				if(is_array($_POST['dir'])){				
					if(count($_POST['dir']) > 4)
						$archname = 'selected-'.date('Y_m_d_His').'.zip';
					else{
						$archname = implode('-',$_POST['dir']).'-'.date('Y_m_d_His').'.zip';
					}
				}elseif($_POST['dir_write']){
					$archname = $_POST['dir'].'-'.date('Y_m_d_His').'.zip';
				}else{
					$archname = $_SERVER['SERVER_NAME'].'-'.date('Y_m_d_His').'.zip';
				}
			}else{
				$archname = $_POST['addtozip'];
			}
			$fileName = $pathname.'/'.$archname;
			
			if($fp = fopen($log_file, 'w')){
				fwrite($fp, $fileName.'\n');
			} else {
				$dirperm = substr(sprintf('%o', fileperms($pathname)), -4);
				if(chmod($pathname, 0777)){
					fwrite($fp, $fileName.'\n');
				} else {
					$_SESSION['message']['ERROR'][] = trnslt('permission').' '.$dirperm;
					fwrite(STDERR, trnslt('permission').' '.$dirperm);
					return;
				}
			}
	
			//ZIPARCHIVE::ER_ZLIB
			if ($zip->open($fileName, ZIPARCHIVE::CREATE) !== true){
				fwrite(STDERR, 'Error while creating archive file');
				$_SESSION['message']['ERROR'][] = trnslt('zip_not');
				exit(1);
			}

			if(!$_POST['ajax']){
				$_SESSION['history'] = array();
			}
			# додаємо файли в архів всі файли із теки src_dir
			
			if(is_array($_POST['dir'])){
				foreach($_POST['dir'] as $onedir){
					addFolderToZip($pathname.'/'.$onedir.'/', $zip, $onedir.'/', $count, $fp);
				}
			}else{
				if($_POST['dir'])
					$src_dir = $pathname.'/'.$_POST['dir'].'/';
				else
					$src_dir = $pathname.'/'.$_POST['dir'];

				addFolderToZip($src_dir, $zip, '', $count, $fp);
			}
			fclose($fp);
			# закриваемо архів
			$zip->close();
			unlink($log_file);
			
			$download = preg_replace('/\/'.basename(__FILE__).'.*/','/',$_SERVER['REQUEST_URI']).$archname;
			$_SESSION['message']['OK'][] = trnslt('zip_created').' <a id="archv" href="'.$download.'">'.$archname.'</a>. '.trnslt('zip_added_files').' <span id="cntfls">'.$count.'</span>';
			$_SESSION['history'][] = '==========='.trnslt('zip_created').' <a href="'.$download.'">'.$archname.'</a>. '.trnslt('zip_added_files').' '.$count.'===========';
		}else{
			$_SESSION['message']['NOTICE'][] = 'Виберіть теку'.'<br />';
		}
	}

	# функція перевірки паролю -------------------------------------------
	function check_pass($pass){
		if(md5($_POST['pswrd']) == $pass){
			$_SESSION['psswrd'] = $pass;
		}else{
			$_SESSION['pass_count']--;
			$_SESSION['message']['ERROR'][] = trnslt('access_denied').' '.trnslt('shots').' '.trnslt('left').': '.$_SESSION['pass_count'];
		}
	}
	
	# функція відображення повідомлень -----------------------------------
	function show_log($type, $text){
		switch ($type) {
			case 'ERROR':
				return '<div class="msg w"><i>er</i>'.$text.'</div>';
			case 'NOTICE':
				return '<div class="msg i"><i>!</i>'.$text.'</div>';
			case 'OK':
				return '<div class="msg ok"><i>ok</i>'.$text.'</div>';       
			default:
				return 'wrong type';
		}
	}
	
	# функція виводу повідомлень -----------------------------------------
	function show_messages(){
		if($_SESSION['message']){
			foreach($_SESSION['message'] as $key => $messages){
				foreach($messages as $text){
					echo show_log($key, $text);
				}
				$_SESSION['message'][$key] = array();
			}
		}
	}

	# функція збереження налаштувань логування ---------------------------
	function save_log(){
		$_SESSION['hist']['ok'] = $_POST['show_ok']?1:0;
		$_SESSION['hist']['notice'] = $_POST['show_notice']?1:0;
		$_SESSION['hist']['error'] = $_POST['show_error']?1:0;
		//$_SESSION['options']['min'] = $_POST['min'];
		//$_SESSION['options']['max'] = $_POST['max'];
		$_SESSION['options']['max_size'] = $_POST['max_size'];
		$_SESSION['options']['files_for_iteration'] = $_POST['files_for_iteration'];
		$_SESSION['options']['confirm_unzip'] = $_POST['confirm_unzip']?1:0;
		$_SESSION['options']['confirm_delzip'] = $_POST['confirm_delzip']?1:0;
		
		$_SESSION['message']['OK'][] = trnslt('settings_saved');
	}

	# функція перевірки прав на запис ------------------------------------
	function check_permission($pathname, $log_file){
		if($fp = fopen($log_file, 'w')){
			fclose($fp);
			unlink($log_file);
		} else {
			$dirperm = substr(sprintf('%o', fileperms($pathname)), -4);
			if(!chmod($pathname, 0777)){
				$_SESSION['message']['ERROR'][] = trnslt('permission').' '.$dirperm;
			}
		}
	}

	# функція виходу із сессії -------------------------------------------
	function logout(){
		$_SESSION['psswrd'] = 1;
		$_SESSION['pass_count'] = 3;
		unset($_SESSION['log']);
	}
?>
<?
	init();
	$l = set_lang();
	
	if(isset($_GET['del']) && !file_exists('checker.php')){
		kamikadze();
	}
	elseif($_GET['logout']){
		logout();
	}
	elseif(md5($_POST['pswrd']) == $pass){
		$_SESSION['psswrd'] = $pass;
	}
	
	//$_SESSION['psswrd'] = 'b59c67bf196a4758191e42f76670ceba';
	if($_SESSION['psswrd'] == $pass){
		$dirs = scandir($pathname);
		unset(
			$dirs[array_search('.',$dirs)],
			$dirs[array_search('..',$dirs)],
			$dirs[array_search('.git',$dirs)]
		);
		
		if($_POST['log_submit']){
			save_log();
		}
		elseif($_POST['unzip']){
			unzippp($pathname, $_POST['zipfile']);
		}
		elseif($_POST['delzip']){
			delzippp($pathname, $_POST['zipfile']);
		}
		elseif($_POST['submit']){
			if($_POST['ajax']){
				if(isset($_POST['dir']) || isset($_POST['dir_write'])) {
					$_SESSION['options']['min_orig'] = $_SESSION['options']['min'];
					$_SESSION['options']['max_orig'] = $_SESSION['options']['max'];
					
					$_POST['dir'] = explode('|',substr($_POST['dir'],1, strlen($_POST['dir'])));
					
					$_SESSION['options']['min'] = $_POST['skipfiles'];
					$_SESSION['options']['max'] = $_POST['skipfiles']+$_SESSION['options']['files_for_iteration'];
				}
			}
			start_archivation($pathname, $log_file);
			
			if($_POST['ajax']){
				$_SESSION['options']['min'] = $_SESSION['options']['min_orig'];
				$_SESSION['options']['max'] = $_SESSION['options']['max_orig'];
				
				if($_POST['skipfiles'] == 0 && isset($_POST['dir'])){
					$allfiles_ajax = 0;
					if(is_array($_POST['dir'])){
						foreach($_POST['dir'] as $fldr){
							$allfiles_ajax += getFolderCount_for_ajax($pathname.'/'.$fldr);
						}
						$_SESSION['all_count_files'] = $allfiles_ajax;
					} else{
						$allfiles_ajax += getFolderCount_for_ajax(($_POST['dir'])?($pathname.'/'.$_POST['dir']):$pathname);
						$_SESSION['all_count_files'] = $allfiles_ajax;
					}
					
					if($allfiles_ajax > $_SESSION['options']['files_for_iteration'])
						echo '<div><span id="allfls">'.($allfiles_ajax-1).'</span></div>';
				}
			}
		}
		
		if(!$_POST['submit'] && $_GET['get_count'] == 1 && !$_POST['pswrd']){
			error_reporting(E_ERROR);
			$all_count = getFolderCount($pathname);
		}else
			$all_count = trnslt('many');
	}
	
	if($_POST['ajax']){
	
		echo show_messages();
	
	} else {
?>
		<!DOCTYPE html>
		<html>
			<head>
				<meta charset="UTF-8" />
				<meta name="Author" CONTENT="Lesyuk Sergiy">
				<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<?
				if($_SESSION['psswrd'] == $pass){
?>
					<script>
						var all_files = 0;
						var archive = '';
						var intrvl
						
						$(document).ready(function(){
							if($('body').height() > $(window).height()){
								$('.footer').removeAttr('style');
							}
						
							$('.nav li').click(function(){
								if(!$(this).hasClass('active')){
									window.location.href= '//<?=$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].'?section='?>'+$(this).attr('id');
								}
							});
<?
							if($_SESSION['options']['confirm_delzip']){
?>
								$('.zip.clear input[name="delzip"]').click(function(){
									if (confirm('<?=trnslt('delete_confirm')?>'))
										return true;
									else
										return false;
								});
<?
							}
							if($_SESSION['options']['confirm_unzip']){
?>
								$('.zip.clear input[name="unzip"]').click(function(){
									if (confirm('<?=trnslt('extract_confirm')?>'))
										return true;
									else
										return false;
								});
<?
							}
?>
						});
						
						// вставлення тек із блоку "наприклад" --------------------------------------
						function addEx(el){
							var input = el.parentNode.parentNode.getElementsByTagName('input').item(0);
							var arr = [];
							if(input.value.length)
								var arr = input.value.split('|');

							arr.push(el.innerHTML);
							input.value = arr.join('|');
						}
						
						// Збір данних форми для архівування ----------------------------------------
						function collectdata(){
							var addtozip = '';					
							$('input.addtozip').each(function(){
								if($(this)[0].checked)
									addtozip = $(this).val();
							});
							
							var dir = '';
							var chk = 0;
							if($('input#alldir')[0].checked){
								chk = 1;
							}else{
								$('input.selecteddir').each(function(){
									if($(this)[0].checked){
										chk = 1;
										dir = dir+'|'+$(this).val();
									}
								});
								if(!chk){
									dir = chk;
								}
							}
							var dir_write = $('input[name=dir_write]').val();
							var exept = $('input[name=exept]').val();
							var submit = 'start';
							
							return {'addtozip' : addtozip, 'dir' : dir, 'dir_write' : dir_write, 'exept': exept, 'submit' : submit, 'ajax' : 'ajax', 'skipfiles' : '0'};
						}
						
						// Запуск аяксового запросу на архівацію ------------------------------------
						function postgo(sendata){
							if(!all_files){
								$('.messages').html('<div class="msg i process"><div><div class="msg ok progress" style="width: 0%;"></div><div class="flytext"><?=trnslt('zip_added_files')?> <span id="cntfls">0</span> [<span id="ldng">----------</span>]</div><div></div>');
							}
							
							var wait = [
								'#---------',
								'-#--------', 
								'--#-------',
								'---#------',
								'----#-----',
								'-----#----',
								'------#---',
								'-------#--',
								'--------#-',
								'---------#',
							];
							var i=0;
							var intrvl = setInterval(function(){
								if(i>=wait.length) i=0;	
								$('.messages #ldng').html(wait[i++]);
							}, 400);
							
							$.ajax({
								type: 'POST',
								url: '<?=$_SERVER['SCRIPT_NAME']?>',
								data: sendata
							}).success(function (data) {
								clearInterval(intrvl);
								
								if(!all_files){
									all_files = parseInt($(data).find('#allfls').html());
									archive = $(data).find('#archv').html();
									sendata['addtozip'] = archive;
								}
								
								skipfiles = parseInt($(data).find('#cntfls').html());
								sendata['skipfiles'] = skipfiles;
								
								console.log(skipfiles, all_files, archive);
								
								if(skipfiles < all_files){
									$('.messages .progress').css('width', (100*skipfiles/all_files)+'%');
									$('.messages #cntfls').html(skipfiles+'/'+all_files);
									postgo(sendata);
								} else {
									if(data.indexOf('msg') > 0){
										$('.messages').html(data);
									} else {
										data = data.replace(/<br \/>/, '');
										$('.messages').html('<div class="msg w"><i>err</i><span style="">'+data+'</span></div>');
									}
									$('.archivatorstart').removeAttr('disabled');
								}
							}).error(function (){
								$('.messages').html('<div class="msg w"><i>err</i>File not found</div>');
								console.log('Ошибка при получении данных');
							});
						}
						
						// Підготовка до архівації --------------------------------------------------
						function startarchivation(){
							$('html, body').animate({ scrollTop: 0 }, 100);
							$('.archivatorstart').attr('disabled', 'disabled');
							var skipfiles = 0;
							all_files = 0;
							archive = '';
							
							var sendata = collectdata();
							
							if(sendata['dir'] == '0'){
								delete sendata['dir'];
							}
							if(sendata['dir_write'].length == 0 || sendata['dir_write'] == ' '){
								delete sendata['dir_write'];
							}
							
							postgo(sendata);
						}
					</script>
<?
				}
?>
				<style>
					* { margin:0; padding:0; }
					body { font:13px/18px Verdana, Arial, Tahoma, sans-serif; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; color:#FFF; width:100%; background:#39404C; overflow-y: scroll; }
					input.archivatorstart { display: block; width:30%; }
					legend { font-weight:bold; font-size:medium; }
					.archivelog div { max-height:394px; overflow:auto; }
					.progress { height:40px; width:100%; transition:all 2s ease 0; }
					.kamicadze { color:#888888; margin-top:-30px; position:absolute; right:10px; text-decoration:none; }
					.kamicadze:hover { text-decoration:underline; }
					.kamicadze:active { color:#444444; }
					.red { color:red; }
					.green { color:green; }
					.zip.clear { line-height: 52px; }
					form.zip:hover { background:#E8E2D2; }
					.right { float:right; margin-left:20px; }
					.clear { clear:both; }
					.logo { color:#888888; display:block; font-size:28px; text-decoration:none; text-shadow:0 0 1px #888888; transition:all .4s ease 0; float:left; padding:20px 10px 10px 0; transition: all 0.3s ease 0s; }
					.logo:hover { color: #F1F1FF; text-shadow: 0 0 8px #FFFFFF; }
					h1 { line-height: 50px; }
					h2 { margin-bottom:20px; }
					.section { clear:both; position:relative; box-shadow:0 5px 10px rgba(0,0,0,0.2); margin:0 0 20px; }
					.section__headline { background: #E05C50; background: linear-gradient(#EF705F, #E05C50) repeat scroll 0 0 rgba(0, 0, 0, 0); box-shadow: 0 1px #F08C75 inset; font-size: 16px; padding: 8px 14px; text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.2); }
					.section__inner.exeption > span:hover { cursor:pointer; text-shadow:0 0 0; color:#000000; }
					.section__inner { color:#444444; padding:15px; background:#EFEFEF; }
					.wrapper { max-width:894px; position:relative; margin:0 auto; }
					label { cursor:pointer; display:inline-block; line-height:22px; }
					select,input[type="text"],input[type="password"] { border:1px solid #C4C9D0; color:#646F81; padding:2px 5px; }
					select { padding: 2px; }
					select:focus,input[type="text"]:focus,input[type="password"]:focus { border:1px solid #8891A2; }
					input[type="submit"] { height:34px; cursor:pointer; font:16px Verdana, Arial, sans-serif; border:none; color:#FFF; box-shadow:0 5px 10px rgba(0,0,0,0.3); text-shadow:1px 1px 1px rgba(0,0,0,0.2); padding:0 15px; background:#94CF58; background:linear-gradient(#94CF58,#85CA40); margin: 10px auto; }
					input[type="submit"]:hover { background:linear-gradient(#A4DF68,#95DA50); }
					input[type="submit"]:active { box-shadow:0 0 0!important; background: #85CA40; }
					input[type="submit"][disabled="disabled"] { background: none repeat scroll 0 0 #888888; box-shadow: 0 0 0; }
					.nav { float:right; box-shadow:0 5px 10px rgba(0,0,0,0.2); background-color: #646F81; margin-top: 10px; }
					.nav li { float:left; list-style:none; cursor:pointer; border-left:1px solid #515D6D; box-shadow:inset -1px 1px #6B7787; }
					.nav li a,.nav li span { display:block; color:#E7EAED; text-decoration:none; padding:8px 12px; }
					.nav li:first-child { border-left:none; }
					.nav li:hover { color:#FFF; box-shadow:inset 0 1px #F08C75; background:#EF705F; background:linear-gradient(#EF705F,#E05C50); }
					.nav li:active { box-shadow:inset 0 1px #F08C75; background:#E04C40; }
					.nav li.active { box-shadow:inset 0 1px #6B7787; background:#4B525F; background:linear-gradient(#5B6475,#4B525F); }
					.row:first-child { margin-top:0; }
					.row:last-child { margin-bottom:0; }
					.row { margin:10px 0; }
					.messages { padding-top: 20px; }
					.msg.w { background-color: #F13921; }
					.msg.i { background-color: #4FC0E8; }
					.msg.ok { background-color: #94CF58; }
					.msg i { color:#FFF; line-height:15px; font-size:11px; text-align:center; position:absolute; left:12px; top:12px; display:inline-block; width:16px; height:16px; border:1px solid #FFF; }
					.msg { box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2); line-height: 20px; margin: 0 0 20px; padding: 10px 0 10px 45px; position: relative; white-space: nowrap; }
					.msg.process { padding: 6px; text-align: center; }
					.msg.process > div { background-color: #62C4BF; box-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1) inset, 2px 2px 1px rgba(0, 0, 0, 0.4) inset; }
					.msg.ok.progress { margin: 0; padding: 0; transition: all 4s ease 0s; box-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1) inset, 2px 2px 1px rgba(0, 0, 0, 0.4) inset; }
					.flytext { font-size: 13px; margin: -29px auto; position: absolute; width: 100%; }
					.tab.createar { padding-bottom: 40px; }
					.footer { bottom:0; color:#AEB4BB; font-size:11px; left:0; width:100%; padding:8px 0; background:#2E333D; opacity:0.6; }
					.footer a { color:#AEB4BB; }
					.footer a:hover { color:#FFF; }
					.login { position:absolute; width:300px; margin:10% 0 0 10%; }
					input.inside[type="submit"] { box-shadow: 0 1px 1px rgba(0, 0, 0, 0.3); float: right; margin: 8px; }
					.page_gen { position:absolute; margin-top:-30px; }
					.section__headline.exeption > span { cursor:pointer; }
					.grey { color:grey; }
					.file_mamger_table { width: 100%; }
					.file_mamger_table tr td { padding: 2px 4px; }
					.file_mamger_table tr:nth-child(even) td{ background-color: #E0E0E0; }
					.file_mamger_table tr:hover td { background-color: #D0D0D0; }
					.file_mamger_table .count, .file_mamger_table .size { width: 20%; text-align: right; }
				</style>
				<title>Archiver</title>
			</head>
			<body>
				<div class="wrapper">
<?
					if($_SESSION['psswrd'] == $pass){
						check_permission($pathname, $log_file);
						check_new_vers(VERSION);
						$archive_exist = check_for_archive($pathname."/", $dirs);
?>
						<header>
							<a class="logo" href="<?=$url?>">ARCHIVER</a>
						
							<nav>
								<menu class="nav">
									<li id="createar" <?=(!$_GET['section'] || $_GET['section'] == 'createar')?'class="active"':''?> ><span><?=trnslt('create_arch')?></span></li>
									<li id="extractar" <?=($_GET['section'] == 'extractar')?'class="active"':''?> ><span><?=trnslt('extract_arch')?></span></li>
									<li id="filemanager" <?=($_GET['section'] == 'filemanager')?'class="active"':''?> ><span><?=trnslt('file_manager')?></span></li>
									<li id="options" <?=($_GET['section'] == 'options')?'class="active"':''?> ><span><?=trnslt('settings')?></span></li>
									<li><a href="<?=$url?>?logout=ok"><?=trnslt('exit')?></a></li>
								</menu>
							</nav>
							<div class="clear"></div>
						</header>
						
						<div id="form_block">
							<div class="messages"><?=show_messages();?></div>
<?
							if(!$_GET['section'] || $_GET['section'] == 'createar'){
?>
								<div class="tab createar">
									<h2><?=trnslt('zipsite')?></h2>
<?
									if(count($_SESSION['history'])){
?>
										<section class="section las_archive_log">
											<div class="section__headline"><?=trnslt('zip_log')?>:</div>
											<div class="section__inner">
												<div class="row archivelog">
													<div>
														<?
															foreach($_SESSION['history'] as $line){
																echo $line."<br />";
															}
															$_SESSION['history'] = array();
														?>
													</div>
												</div>
											</div>
										</section>
<?
									}
?>
									<section class="section count_files">
										<div class="section__headline"><?=trnslt('count_files')?>:</div>
										<div class="section__inner">
											<div class="row">
												<?=trnslt('full_files')?> <b><?=$all_count?></b>
												<input type="checkbox" id="get_count" name="get_count" value='1' <?=(!$_POST['submit'])?'checked="checked"':''?> onclick="if(get_count.checked)window.location='<?='//'.$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].'?section='.$_GET['section'].'&get_count=1'?>'; else window.location='<?='//'.$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].'?section='.$_GET['section']?>'" />
												<?=trnslt('show_full_count_files')?>
											</div>
										</div>
									</section>
									
									<form action="<?=$url?>" method="POST">
										<section class="section choose_zip">
											<div class="section__headline"><?=trnslt('choose_zip')?>:</div>
											<div class="section__inner">
												<div class="row">
													<input class="addtozip" type="radio" name="addtozip" value="new" checked="checked" /> <?=trnslt('create_new_zip')?><br />
<?
													if(count($archive_exist)){
														foreach($archive_exist as $zzz){
															if (!is_dir($pathname."/".$zzz) && strstr($zzz, "zip")){
?>
																<input class="addtozip" type="radio" name="addtozip" value="<?=$zzz?>" /> <?=trnslt('add_to_zip')?> <b><?=$zzz?></b><br />
<?
															}
														}
													}
													
													unset($_POST['exept'][array_search(".",$_POST['exept'])],$_POST['exept'][array_search("..",$_POST['exept'])]);
?>
												</div>
											</div>
										</section>
										
										<section class="section choose_dir">
											<div class="section__headline"><?=trnslt('choose_dir')?>:</div>
											<div class="section__inner">
												<div class="row">
													<?=show_root_dir($pathname."/", $dirs);?>
													<div class="clear"><br /></div>
													<b><?=trnslt('enter_subdir')?></b>
													<input type="text" name="dir_write" value="<?=$_POST['dir_write']?>" style="width:99%" /> <br />
												</div>
											</div>
										</section>
										
										<section class="section dir_exeption">
											<div class="section__headline exeption"><?=trnslt('dir_exeption')?></div>
											<div class="section__inner exeption">
												("<span onclick="addEx(this)">upload</span>|<span onclick="addEx(this)">products_pictures</span>|<span onclick="addEx(this)">images</span>|<span onclick="addEx(this)">image_db</span>|<span onclick="addEx(this)">rss</span>|<span onclick="addEx(this)">gallery</span>|<span onclick="addEx(this)">uploads</span>|<span onclick="addEx(this)">cgi-bin</span>")
												<div class="row">
													<input type="text" name="exept" value="<?=implode("|",$_POST['exept'])?>" style="width:99%" />
												</div>
											</div>
										</section>
										
										<div class="clear"></div>
										
										<!-- input class="archivatorstart" type="submit" name="submit" value="<?=trnslt('start')?>" -->
										<input class="archivatorstart" type="submit" name="submit" value="<?=trnslt('start')?>" onclick="startarchivation(); return false;" />
									</form>
								</div>
<?
							}elseif($_GET['section'] == 'extractar'){
?>
								<div class="tab extractar">
									<h2><?=trnslt('unziper')?></h2>
									<section class="section extractar zip_found">
										<div class="section__headline"><?=trnslt('zip_found')?>:</div>
										<div class="section__inner">
											<div class="row">
<?
												if(count($archive_exist)){
													foreach($archive_exist as $dir){
?>
														<form class="zip clear" enctype="multipart/form-data" action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
															<input class="selectedzip" type="hidden" name="zipfile" value="<?=$dir?>" checked="checked" />
															<span title="<?=number_format(filesize($pathname."/".$dir)/1024, 2, ".", " ")?> кб"><b><?=$dir?></b></span>
															<input class="right inside" type="submit" name="delzip" value="<?=trnslt('dell')?>" />
															<input class="right inside" type="submit" name="unzip" value="<?=trnslt('unzip')?>" />
															<div class="clear"></div>
														</form>
<?
													}
												} else {
													echo trnslt('zip_not_found');
												}
?>
											</div>
										</div>
									</section>
								</div>
<?
							}elseif($_GET['section'] == 'filemanager'){
?>
								<div class="tab filemanager">
									<h2><?=trnslt('file_manager')?></h2>
									
									<section class="section size_files">
										<div class="section__headline"><?=trnslt('size_files')?>:</div>
										<div class="section__inner">
											<div class="row">
<?
												$set_count = '//'.$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].'?section='.$_GET['section'].'&fmdir='.$_GET['fmdir'].'&get_size=1';
												$no_count = '//'.$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].'?section='.$_GET['section'].'&fmdir='.$_GET['fmdir'];
?>
												<input type="checkbox" id="get_size" name="get_size" value='1' <?=(!$_POST['submit'])?'checked="checked"':''?> onclick="if(get_size.checked)window.location='<?=$set_count?>'; else window.location='<?=$no_count?>'" />
												<?=trnslt('show_full_size_dir')?>
												<?=(!$_GET['get_size'])?"<script>document.getElementById('get_size').checked = false;</script>":''?>
											</div>
										</div>
									</section>
									
									<section class="section file_manager">
										<div class="section__headline"><?=trnslt('files_&_dirs_in')?> <?="/".$_GET['fmdir']?>:</div>
										<div class="section__inner">
											<div class="row">
												<?=show_root_dir_and_files($pathname.($_GET['fmdir']?("/".$_GET['fmdir']):'')."/", $_GET['fmdir']);?>
											</div>
										</div>
									</section>
								</div>
<?
							}elseif($_GET['section'] == 'options'){
?>
								<div class="tab options">
									<h2><?=trnslt('settings')?></h2>
									<section class="section language">
										<div class="section__headline"><?=trnslt('language')?>:</div>
										<div class="section__inner">
											<div class="row">
												<form class="lang_form" action="<?=$url?>" method="GET">
													<?=trnslt('language')?>:
													<select name="lang" onchange="this.form.submit()">
														<option value="ua" <?=($l=='ua')?'selected="selected"':''?>>Українська</option>
														<option value="en" <?=($l=='en')?'selected="selected"':''?>>English</option>
														<option value="ru" <?=($l=='ru')?'selected="selected"':''?>>Русский</option>
													</select>
												</form>
											</div>
										</div>
									</section>
								
									<form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
										<section class="section show_log_options">
											<div class="section__headline"><?=trnslt('show_log')?>:</div>
											<div class="section__inner">
												<div class="row">
													<input type="checkbox" name="show_ok" value='1' <?if($_SESSION['hist']['OK']):?>checked="checked"<?endif;?> /> <?=trnslt('show_log_ok')?> |
													<input type="checkbox" name="show_notice" value='1' <?if($_SESSION['hist']['NOTICE']):?>checked="checked"<?endif;?> /> <?=trnslt('show_log_notice')?> |
													<input type="checkbox" name="show_error" value='1' <?if($_SESSION['hist']['ERROR']):?>checked="checked"<?endif;?> /> <?=trnslt('show_log_error')?>
													<div class="clear"></div>
												</div>
											</div>
										</section>
										
										<section class="section confirm_window_options">
											<div class="section__headline"><?=trnslt('show_confirm_window')?>:</div>
											<div class="section__inner">
												<div class="row">
													<input type="checkbox" name="confirm_unzip" value='1' <?if($_SESSION['options']['confirm_unzip']):?>checked="checked"<?endif;?> /> <?=trnslt('unziping_arch')?> |
													<input type="checkbox" name="confirm_delzip" value='1' <?if($_SESSION['options']['confirm_delzip']):?>checked="checked"<?endif;?> /> <?=trnslt('deleting_arch')?>
													<div class="clear"></div>
												</div>
											</div>
										</section>
										
										<section class="section dont_zip_file_more_than">
											<div class="section__headline"><?=trnslt('dont_zip_more')?>:</div>
											<div class="section__inner">
												<div class="row">
													<input type="number" min="1" max="512000" name="max_size" value="<?=$_SESSION['options']['max_size']?>" required /> кб
												</div>
											</div>
										</section>
										
										<section class="section zip_max_files_count">
											<div class="section__headline"><?=trnslt('zip_max_files_count')?>:</div>
											<div class="section__inner">
												<div class="row">
													<?=trnslt('limit')?> <input type="number" min="1" max="20000" name="files_for_iteration" value="<?=$_SESSION['options']['files_for_iteration']?>" required /> <?=trnslt('ajax_load_step')?>
												</div>
											</div>
										</section>
										
										<input class="right " type="submit" name="log_submit" value='<?=trnslt('show_log_save')?>' />
										<div class="clear"></div>
									</form>
								</div>
<?
							}
?>
						</div>
<?
					}else{
						if (class_exists('ZipArchive')){
?>
							<header>
								<a class="logo" href="<?=$url?>">ARCHIVER</a>
								<div class="clear"></div>
							</header>
<?
							if($_SESSION['pass_count'] > 0){
								check_new_vers(VERSION);
								if($_POST['pswrd'])
									check_pass($pass);
							
								show_messages();
?>
								<section class="section login login_form">
									<div class="section__headline"><?=trnslt('enter_pass')?>:</div>
									<div class="section__inner">
										<div class="row">
											<form name="login" action="<?=$url?>" method="POST">
												<input type="password" name="pswrd" value="" />
												<input class="inside" type="submit" name="gopass" value="<?=trnslt('login')?>" />
											</form>
										</div>
										<div class="row">
											<form class="lang_form" action="<?=$url?>" method="GET">
												<?=trnslt('language')?>:
												<select name="lang" onchange="this.form.submit()">
													<option value="ua" <?=($l=='ua')?'selected="selected"':''?>>Українська</option>
													<option value="en" <?=($l=='en')?'selected="selected"':''?>>English</option>
													<option value="ru" <?=($l=='ru')?'selected="selected"':''?>>Русский</option>
												</select>
											</form>
										</div>
									</div>
								</section>
<?
							} else {
								echo show_log("ERROR", trnslt('access_denied'));
							}
						}else{
							echo "<h1 align='center'>".trnslt('zip_sorry')."</h1>";
						}
					}
?>
				</div>
				<footer class="footer" style='position:absolute'>
					<div class="page_gen">
						<?=trnslt('page_gen')." ".round(microtime(1)-$timestart, 4)." ".trnslt('sec').".<br />"?>
					</div>
					<a class="kamicadze"  href="<?=preg_replace("/\?.+/",'',$url)?>?del=itself" title="<?=trnslt('kamikadze')?>"><?=trnslt('kamikadze')?></a>
					
					<div class="wrapper">
						<span style="float: left;">&copy; <?=date("Y")?> <b>ARCHIVER</b> <?=trnslt('develop')?> <u>Lesyuk Sergiy</u>. All Right Reserved.</span>
						<span style="float: right;"><?=trnslt('your_vers')?> <?=VERSION?></span>
						<div class="clear"></div>
					</div>
				</footer>
			</body>
		</html>
<?
	}
?>