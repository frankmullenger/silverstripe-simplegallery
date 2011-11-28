<?php
/**
 * Gallery page, to hold a gallery
 * 
 * @author Frank Mullenger <frankmullenger@gmail.com>
 * @package simplegallery
 */
class GalleryPage extends Page {
  
  /**
   * Gallery page has many images
   * 
   * @see GalleryImage
   * @var Array
   */
  static $has_many = array (
  	'Images' => 'GalleryImage'
  );

  /**
   * Add a {@link ComplexTableField} for managing the images.
   * 
   * @see SiteTree::getCMSFields()
   * @return FieldSet
   */
  public function getCMSFields() {
    
    $fields = parent::getCMSFields();

    //Gallery
    $manager = new ComplexTableField(
      $this,
      'Images',
      'GalleryImage',
      array(
        'Thumbnail' => _t('GalleryPage.THUMBNAIL', 'Thumbnail'),
        'Caption' => _t('GalleryPage.CAPTION', 'Caption')
      ),
      'getCMSFields_forPopup'
    );
    $manager->setPopupSize(650, 400);
    $manager->setAddTitle(_t('GalleryPage.TITLE'), 'Gallery Image');
    $fields->addFieldToTab("Root.Content." . _t('GalleryPage.HEADING', 'Gallery'), $manager);

    return $fields;
  }
  
  /**
   * Handle pagination for Images
   * 
   * @return DataObjectSet Set of images based on pagination
   */
  function PaginatedImages() {
    
    if(!isset($_GET['start']) || !is_numeric($_GET['start']) || (int)$_GET['start'] < 1) $_GET['start'] = 0;
    $SQL_start = (int)$_GET['start'];
    
    $doSet = DataObject::get(
      $callerClass = "GalleryImage",
      $filter = "`GalleryPageID` = '".$this->ID."'",
      $sort = "",
      $join = "",
      $limit = "{$SQL_start},2"
    );

    return $doSet ? $doSet : false;
  }

}

/**
 * Controls the {@link GalleryPage}, loads some js and css for the lightbox
 * 
 * @author Frank Mullenger <frankmullenger@gmail.com>
 * @package simplegallery
 */
class GalleryPage_Controller extends Page_Controller {
  
  /**
   * Load javascript and css for the jQuery lightbox.
   * 
   * @see Page_Controller::init()
   */
  function init() {
    
    parent::init();

    Requirements::javascript('sapphire/thirdparty/jquery/jquery-packed.js');
    Requirements::javascript('simplegallery/javascript/jquery.lightbox.min.js');
    Requirements::javascript('simplegallery/javascript/GalleryPage.js');
    Requirements::css('simplegallery/css/lightbox.css');
  }
  
  
}