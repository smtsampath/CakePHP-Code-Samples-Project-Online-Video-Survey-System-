<?php
class ImagesController extends AppController {

    var $name = 'Images';

    function admin_index() {
        $this->Image->recursive = 0;
        $this->set('images', $this->paginate());
    }

    function admin_view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid image', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('image', $this->Image->read(null, $id));
    }

    function admin_add($id = false) {
        if (!empty($this->data)) {
            $this->Image->create();
            
            if ($this->Image->save($this->data)) {
                if ($this->__processImage($this->Image->id)) {
                    $this->Session->setFlash(__('The image has been saved', true)); 
                } else {
                    $this->Session->setFlash(__('An error occured while trying to upload the image, please try again using the edit option', true));
                }
                $this->redirect('/admin/charities/view/' . $this->data['Image']['charity_id']);
            } else {
                $this->Session->setFlash(__('The image could not be saved. Please, try again.', true));
            }
        }
        
        //$this->set('gal_id', $id);
        $charities = $this->Image->Charity->find('list');
        $this->set(compact('charities'));
    }

    function admin_edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid image', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Image->save($this->data)) {
                if ($this->__processImage($this->Image->id)) {
                    $this->Session->setFlash(__('The image has been saved', true)); 
                } else {
                    $this->Session->setFlash(__('An error occured while trying to upload the image, please try again using the edit option', true));
                }
                $this->redirect('/admin/charities/view/' . $this->data['Image']['charity_id']);
            } else {
                $this->Session->setFlash(__('The image could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Image->read(null, $id);
        }
        $charities = $this->Image->Charity->find('list');
        $this->set(compact('charities'));
    }
    
    /**
     * 
     * Saves the image. prepends the id
     * @param $fileName
     */
    function __processImage($id = 0) { 
        if (isset($_FILES) && !empty($_FILES)) {
            $ext    =  strtolower(substr($_FILES['theImage']['name'], strrpos($_FILES['theImage']['name'], '.') + 1));
            
            if (is_uploaded_file($_FILES['theImage']['tmp_name']) && $ext == 'jpg') {
                //move files
                $path   = WWW_ROOT . 'charity' . DS . $id . '.' . $ext;
                unlink($path); // in case the image is already there
                $this->__clearCache();
                return (@move_uploaded_file($_FILES['theImage']['tmp_name'], $path) !== false);
                
            }
        }
        return true;
    }   
    
    function __deleteImage($id = 0) {
        $path   = WWW_ROOT . 'charity' . DS . $id . '.jpg';
        @unlink($path); 
    }
    
    function __clearCache() {
        $path   = WWW_ROOT . 'cache' . DS;
        $files  = @scandir($path);
        if (is_array($files)) {
            foreach ($files as $file) {
                @unlink($path . $file);
            }
        }
    }

    function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for image', true));
            $this->redirect(array('action'=>'index'));
        }
        $this->Image->recursive     = -1;
        $image  = $this->Image->read('charity_id', $id);
        $charity_id    = $image['Image']['charity_id'];
        
        if ($this->Image->delete($id)) {
            $this->__deleteImage($id);
            $this->Session->setFlash(__('Image deleted', true));
            $this->redirect('/admin/charities/view/' . $charity_id);
        }
        $this->Session->setFlash(__('Image was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }
}
?>