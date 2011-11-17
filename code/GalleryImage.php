<?php
/**
 * Represents an image in the {@link GalleryPage}.
 * 
 * @see GalleryPage
 * @author Frank Mullenger <frankmullenger@gmail.com>
 * @package simplegallery
 */
class GalleryImage extends DataObject {
  
  /**
   * Images have captions
   * 
   * @var Array
   */
  static $db = array (
    'Caption' => 'Text'
  );

  /**
   * Image is attached to this DataObject. Associate with the {@link GalleryPage}.
   * 
   * @var Array
   */
  static $has_one = array (
    'Image' => 'Image',
    'GalleryPage' => 'GalleryPage'
  );

  /**
   * Get some fields to add images. Can swap the ImageField with an Uploadify
   * counterpart potentially.
   * 
   * @return FieldSet
   */
  public function getCMSFields_forPopup() {
    return new FieldSet(
      new TextareaField('Caption'),
      new ImageField('Image')
    );
  }
  
	/**
   * Helper method to return a thumbnail image for displaying in CTF fields in CMS.
   * 
   * @return Image|String If no image can be found returns '(No Image)'
   */
  function Thumbnail() {
    if ($image = $this->Image()) return $image->CMSThumbnail();
    else return '(No Image)';
  }

  /**
   * Helper function for use on the template to get a FileName for resized images.
   * 
   * @return String Filename of the Image once it has been resized
   */
  function ResizedFileName() {
    $image = $this->Image();

    $resized = $image->SetRatioSize(900,500);
    return $resized->FileName;
  }
}