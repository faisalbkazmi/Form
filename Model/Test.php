<?php
namespace Excellence\Hello\Model;
class Test extends \Magento\Framework\Model\AbstractModel implements TestInterface, \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'excellence_hello_test';

    protected function _construct()
    {
        $this->_init('Excellence\Hello\Model\ResourceModel\Test');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
    public function deleteById($id){
        if($id){
            return $this->load($id)->delete();
        }
    }
    public function getDataById($id){
        if($id){
            return $this->load($id)->getData();
        }
    }
    public function saveEdit($data,$nid)
    {
        $model = $this->load($nid);
        $model->setName($data['name']);
        $model->setMessage($data['message']);
        $model->setEmail($data['email']);
        return $model->save();
    }
  public function searchData($srch)
    {
       
        
        if(!empty($srch)){
            $data = $this->getCollection()
                        ->addFieldToFilter(
                                array('name', 'message','email'),
                                array(
                                    array('like'=>'%'.$srch.'%'), 
                                    array('like'=>'%'.$srch.'%'),
                                    array('like'=>'%'.$srch.'%')
                                )
                            )
                        ->setOrder('id', 'DESC');
            return $data;
              
              
        }
    }
    public function getTableData()
    {
        return $this->getCollection()->setOrder('id', 'DESC');
    }

}
