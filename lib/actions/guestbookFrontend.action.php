<?php
class guestbookFrontendAction extends waViewAction
{
  public function execute()
  {
    $model = new guestbookModel();
    if (waRequest::method() == 'post') {
      $name = waRequest::post('name');
      $text = waRequest::post('text');
      if ($name && $text) {
        $model->insert(array(
          'name' => $name,
          'text' => $text,
          'datetime' => date('Y-m-d H:i:s')
        ));
      }
    }
    $records = $model->order('datetime DESC')->fetchAll();
    $this->view->assign('records', $records);
  }
}