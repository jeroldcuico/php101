<?php

interface IModel
{

    public function doDelete($id);
    public function doValidate($formData);
}

abstract class Model
{

    use ModelTraits, OptionListTraits;

    const MODEL_MESSAGE = "This is an Abstract Class";

    protected $primaryKey = 'id';
    protected $createdBy = 'created_by';
    protected $modifiedBy = 'modified_by';
    protected $createdAt = 'created_at';
    protected $updatedAt = 'updated_at';
    protected $deletedAt = 'deleted_at';

    public function __construct()
    {
    }

    public function getCreatedBy()
    {
        return $this[$this->createdBy];
    }

    public function getModifiedBy()
    {
        return $this[$this->modifiedBy];
    }

    public function getCreatedAt()
    {
        return $this[$this->createdAt];
    }

    public function getUpdatedAt()
    {
        return $this[$this->updatedAt];
    }

    public function getDeletedAt()
    {
        return $this[$this->deletedAt];
    }

    abstract protected function doSave($data);

    public static function getQuoteForToday($key)
    {
        if ($key == 'power') {
            return 'Knowledge is power.' . Model::getAnotherQuote();
        } else {
            return 'Keep smiling and be happy';
        }
    }

    public static function getAnotherQuote()
    {
        return 'Additional Quote';
    }
}

class User extends Model implements IModel
{

    use ModelTraits, OptionListTraits;

    protected $primaryKey = 'usr_id';
    protected $createdAt = 'usr_created_at';
    protected $updatedAt = 'usr_updated_at';
    protected $deletedAt = 'usr_deleted_at';

    public function getIsActive()
    {
        return $this->is_active == 1 ? 'Active' : 'Inactive';
    }

    public function doSave($data)
    {
        if ($data) {
            $this->email = $data->email;
            $this->password = $data->password;
            $this->is_active = 1;
        }
    }

    public function doDelete($id)
    {
        echo 'Record ' . $id . ' has been deleted.';
    }

    public function doValidate($formData)
    {
    }
}

class Employee extends Model
{

    public function doSave($data)
    {
        if ($data) {
            $this->user_id = $data->user_id;
            $this->code = $data->code;
            $this->position_title = $data->position_title;
        }
    }
}

class ContactDetails extends Model
{

    use ModelTraits;

    public function doSave($data)
    {
        // TODO Statement Here
    }
}

trait ModelTraits
{

    public function isDeleted()
    {
        echo 'Is not deleted';
        //return $this->deleted_at == null;
    }
}

trait OptionListTraits
{
    public function getStatusList()
    {
        return ['active', 'inactive'];
    }

    public function getPaymentMethodList()
    {
        return ['COD', 'Paypal', 'GCash', 'CC'];
    }
}


echo Model::MODEL_MESSAGE;
echo ContactDetails::getQuoteForToday('power');

$employee = new Employee();
$employee->doSave(null);

$user = new User();
$user->doDelete(4);
$user->isDeleted();

echo implode(", ", $user->getStatusList());
echo implode(" ,", $user->getPaymentMethodList());
