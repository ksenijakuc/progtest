<?php

/*
 * Класс вида отображения карточки товара
 */
class View_News_View extends View_Layout
{

    public $news = array();
	public $title = 'Новости';
	public $new_id;
    public $is_content = TRUE;
	public $news_dir = '/images/news/';
	public $news_count;
	
	

    /*
     * Обновляем конструктор
     * При создании класса сразу заисываем данные об услуге в переменную
     */
    public function __construct($template = NULL, array $partials = NULL, $alien_call = FALSE)
    {
        parent::__construct($template, $partials, TRUE);
		$this->new_id = Request::current()->param('new_id');
		
		
		
		$newsO = Sprig::factory('news')->load(DB::select('*')->where("id", "=", $this->new_id), NULL);
       
        
      
        $this->news_count = count($newsO);
            for ($i = 0; $i < $this->news_count; $i++)
        {
            $this->news[$i] = $newsO[$i]->as_array();
			$this->news[$i]['image'] = $this->news_dir . $this->news[$i]['image'];
			$this->news[$i]['date'] = date("d-m-Y H:m:s", $this->news[$i]['time']);
            $path[1]['title'] = $this->news[$i]['title'];
			
        }
            
          
       
		$path[0]['title'] = 'Новости ';
		$path[0]['url'] = 'news/';
		
		$this->breadcrumbs = $this->prepare_table($path, 1);
        
    }

}