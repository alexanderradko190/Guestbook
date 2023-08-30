<?php
class guestbookBackendActions extends waViewActions
{
  public function defaultAction()
  {
    $model = new guestbookModel();
    $records = $model->order('datetime DESC')->fetchAll();
    $this->view->assign('records', $records);
    $this->view->assign('url', wa()->getRouting()->getUrl('guestbook'));
    $this->view->assign('rights_delete', $this->getRights('delete'));
  }
  public function deleteAction()
  {
    if ($this->getRights('delete')) {
      $id = waRequest::get('id', 'int');
      if ($id) {
        $model = new guestbookModel();
        $model->deleteById($id);
      }
    }
    $this->redirect(wa()->getAppUrl());
  }
}