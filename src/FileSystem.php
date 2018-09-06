<?php

namespace Tsc\CatStorageSystem;

use \DateTimeInterface;
use Tsc\CatStorageSystem\RootFileExistsException;

class FileSystem implements FileSystemInterface {

  protected $rootDirectory;


  public function createFile(FileInterface $file, DirectoryInterface $parent) {
    if($this->isParentDirectoryPathSet($parent)) {
      $file->setParentDirectory($parent);
      $filepath = $file->getPath();
      if(!file_exists($filepath)) {
        $parent->setFile($file);
        $fp = fopen($filepath, "w");
        fclose($fp);
        $file->setCreatedTime(new \DateTime());
        return $file;
      } else {
        return "Unable to create file, file already exists";
      }
    } else {
      return "Parent directory not set in root directory";
    }
  }


  public function updateFile(FileInterface $file) {
    $file->setModifiedTime(new \DateTime());
  }


  public function renameFile(FileInterface $file, $newName) {
    $newFilePath = $file->getParentDirectory()->getPath() . '/' . $newName;
    if(!file_exists($newFilePath)) {
      $oldFilePath = $file->getPath();
      $file->setName($newName);
      rename($oldFilePath, $newFilePath);
      return $file;
    } else {
      return "Unable to rename file, filename already exists";
    }
  }

  public function deleteFile(FileInterface $file) {
    $filepath = $file->getPath();
    if(file_exists($filepath)) {
      $directory = $file->getParentDirectory();
      $directory->deleteFile($file);
      unlink($filepath);
      return true;
    } else {
      return false;
    }
  }


  public function createRootDirectory(DirectoryInterface $directory) {
      if($this->rootDirectory === null) {
        $this->rootDirectory = $directory;
        $rootPath = getcwd() . '/' . $this->rootDirectory->getName();
        $this->rootDirectory->setPath($rootPath);
        mkdir($rootPath, 0750, true);
        return $this->rootDirectory;
      } else {
        return "Unable to create root directory, root directory already exists.";
      }
  }


  public function createDirectory(
    DirectoryInterface $directory, DirectoryInterface $parent
  ) {
      if($this->isParentDirectoryPathSet($parent)) {
        $directoryPath = $parent->getPath() . '/' . $directory->getName();
        $directory->setPath($directoryPath);
        $directory->setParentDirectory($parent);
        $parent->setSubDirectory($directory);
        mkdir($directoryPath, 0750, true);
        return $directory;
      } else {
        return "parent directory not set in file system";
      }
    }


  public function deleteDirectory(DirectoryInterface $directory) {
    if($this->isParentDirectoryPathSet($directory)) {
      $dirArr = $directory->getSubDirectories();
      $filesArr = $directory->getFiles();
      $combinedArr = array_merge($dirArr, $filesArr);

      foreach($combinedArr as $object) {
        if($this->isDirectory($object)) {
          $directory->deleteSubDirectory($object);
          $this->deleteDirectory($object);
        } else {
          $directory->deleteFile($object);
          unlink($object->getPath());
        }
      }
      $parent = $directory->getParentDirectory();
      $parent->deleteSubDirectory($directory);
      rmdir($directory->getPath());
    }
  }


  public function renameDirectory(DirectoryInterface $directory, $newName) {
    if($this->isParentDirectoryPathSet($directory)) {
      $oldDirectoryPath = $directory->getPath();
      $parentDirectoryPath = $this->getParentDirectoryPath($directory);
      $newDirectoryPath = $parentDirectoryPath . $newName;

      if(!is_dir($newDirectoryPath)) {
        $directory->setName($newName);
        $directory->setPath($newDirectoryPath);
        rename($oldDirectoryPath, $newDirectoryPath);
        $this->renameSubDirectoryAndFilePaths($directory, $oldDirectoryPath, $newDirectoryPath);
      } else {
        return "filepath already exists";
      }
    } else {
      return "Directory not set in filesystem";
    }
  }


  public function getDirectoryCount(DirectoryInterface $directory) {
    return count($directory->getSubDirectories());
  }


  public function getFileCount(DirectoryInterface $directory) {
    return count($directory->getFiles());
  }


  public function getDirectorySize(DirectoryInterface $directory) {
  }


  public function getDirectories(DirectoryInterface $directory) {
    $directoriesList = [];
    $subDirectories = $directory->getSubDirectories();
    foreach($subDirectories as $subDirectory) {
      array_push($directoriesList, $subDirectory->getName());
    }
    return $directoriesList;
  }


  public function getFiles(DirectoryInterface $directory) {
    $filesList = [];
    $files = $directory->getFiles();
    foreach($files as $file) {
      array_push($filesList, $file->getName());
    }
    return $filesList;
  }

  public function getRootDir() {
      return $this->rootDirectory;
  }

  private function isParentDirectoryPathSet(DirectoryInterface $parent) {
    $parentPath = $parent->getPath();
    $rootPath = $this->rootDirectory->getPath();

    return strpos($parentPath, $rootPath) !== false;
  }

  private function isDirectory($item) {
    if($item instanceof \Tsc\CatStorageSystem\Directory) {
      return true;
    }
  }

  private function getParentDirectoryPath(DirectoryInterface $directory) {
    $oldDirectoryPath = $directory->getPath();
    $oldDirectoryName = $directory->getName();
    $oldDirectoryNameLength = strlen($oldDirectoryName);
    return substr($oldDirectoryPath, 0, -$oldDirectoryNameLength);
  }

  private function renameSubDirectoryAndFilePaths(DirectoryInterface $directory, $oldDirectoryPath, $newDirectoryPath) {
    $dirArr = $directory->getSubDirectories();
    $filesArr = $directory->getFiles();
    $combinedArr = array_merge($dirArr, $filesArr);

    foreach($combinedArr as $object) {

      if($this->isDirectory($object)) {
        $objectPath = $object->getPath();
        $newPath = str_replace($oldDirectoryPath, $newDirectoryPath, $objectPath);
        $object->setPath($newPath);
        $this->renameSubDirectoryAndFilePaths($object, $oldDirectoryPath, $newDirectoryPath);
      }
    }
  }
}
