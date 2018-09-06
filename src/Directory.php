<?php

namespace Tsc\CatStorageSystem;

use \DateTimeInterface;

class Directory implements DirectoryInterface {

  protected $directoryName;
  protected $createdTime;
  protected $path;
  protected $parentDirectory;
  protected $subDirectories = [];
  protected $files = [];

  public function getName() {
    return $this->directoryName;
  }

  public function setName($name) {
    $this->directoryName = trim($name);
  }

  public function getCreatedTime() {
    return $this->createdTime;
  }

  public function setCreatedTime(DateTimeInterface $created) {
    $this->createdTime = $created;
  }

  public function getPath() {
    return $this->path;
  }

  public function setPath($path) {
    $this->path = $path;
  }

  public function setParentDirectory(DirectoryInterface $parent) {
    $this->parentDirectory = $parent;
  }

  public function getParentDirectory() {
    return $this->parentDirectory;
  }

  public function getSubDirectories() {
    return $this->subDirectories;
  }

  public function setSubDirectory(DirectoryInterface $directory) {
    array_push($this->subDirectories, $directory);
  }

  public function getFiles() {
    return $this->files;
  }

  public function setFile(FileInterface $file) {
    array_push($this->files, $file);
  }

  public function deleteFile(FileInterface $file) {
    $strict = true;
    if(($key = array_search($file, $this->files, $strict)) !== false) {
      unset($this->files[$key]);
      return true;
    } else {
      return false;
    }
  }

  public function deleteSubDirectory(DirectoryInterface $directory) {
    $strict = true;
    if(($key = array_search($directory, $this->subDirectories, $strict)) !== false) {
      unset($this->subDirectories[$key]);
      return true;
    } else {
      return false;
    }
  }

}
