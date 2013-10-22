<?php

/*
  Отображение для страницы каталога
 */
class View_News_Index extends View_Layout
{
	public $title = 'Новости';
	public $news;
	public $is_content = TRUE;

    public function __construct($template = NULL, array $partials = NULL, $alien_call = FALSE)
    {
        parent::__construct($template, $partials, $alien_call);
		
		
        $newsO = Sprig::factory('news')->load(DB::select('*')->where("status", "=", 1), NULL);
        // Регистрируем количество
        $this->news_count = count($newsO);
        // Проходимся по всем новостям
        for ($i = 0; $i < $this->news_count; $i++)
        {
            $this->news[$i] = $newsO[$i]->as_array();
			$this->news[$i]['date'] = date("d-m-Y H:m:s", $this->news[$i]['time']);
            
          
        }
		
		$path[0]['title'] = 'Новости';
		$this->breadcrumbs = $this->prepare_table($path, 1);
        
    }

    
   

}