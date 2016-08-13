<?php


namespace OneStop\Core\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessCategory extends Model
{

	protected $table = 'business_categories';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name','slug'];





	/**
	 *
	 * @return void
	 */
	private function supplement()
	{
		$this->attributes['edit_url'] = $this->editUrl();
		$this->attributes['url'] = $this->url();
	}

	/**
	 * Override the toArray method;
	 * TODO:: create a trait for this, since we are using this for our all model.
	 *
	 * @return void
	 */
	public function toArray()
	{
		$this->supplement();
		return parent::toArray();
	}

	public function toArrayNoSupplement()
	{
		return parent::toArray();
	}


	/**
	 * Get the edit url for the given category.
	 *
	 * @return string
	 */
	public function editUrl()
	{
		return route('cp.business.categories.edit',$this->slug);
	}

	/**
	 * Get the site url of the given video by slug.
	 *
	 * @return string
	 */
	public function url()
	{
		return '';
	}

}
