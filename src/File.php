<?php

namespace Tsc\CatStorageSystem;

use \DateTimeInterface;

class File implements FileInterface {

  protected $filename;
  protected $filesize;
  protected $createdTime;
  protected $modifiedTime;
  protected $parentDirectory;

  public function getName() {
    return $this->filename;
  }

  public function setName($name) {
    $this->filename = $name;
  }

  public function getSize() {
    return $this->filesize;
  }

  public function setSize($size) {
    $this->filesize = $size;
  }

  public function getCreatedTime() {
    return $this->createdTime;
  }

  public function setCreatedTime(DateTimeInterface $created) {
    $this->createdTime = $created;
  }

  public function getModifiedTime() {
    return $this->modifiedTime;
  }

  public function setModifiedTime(DateTimeInterface $modified) {
    $this->modifiedTime = $modified;
  }

  public function getParentDirectory() {
    return $this->parentDirectory;
  }

  public function setParentDirectory(DirectoryInterface $parent) {
    $this->parentDirectory = $parent;
  }

  public function getPath() {
    return $this->parentDirectory->getPath() . "/" . $this->filename;
  }
}
