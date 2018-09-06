<?php

namespace Tsc\CatStorageSystem;

use PHPUnit\Framework\TestCase;
use DateTimeInterface;

class FileTest extends TestCase {

    public function test_it_creates_a_new_instance() {

        $file = new \Tsc\CatStorageSystem\File;
        $this->assertTrue($file instanceof File);
    }

    public function test_it_allows_you_to_set_and_get_the_filename() {

        $file = new \Tsc\CatStorageSystem\File;
        $file->setName("NewFile.php");
        $this->assertEquals($file->getName(), "NewFile.php");
    }

    public function test_you_can_set_and_get_the_file_size() {

        $file = new \Tsc\CatStorageSystem\File;
        $file->setSize(11);
        $this->assertEquals($file->getSize(), 11);
    }

    public function test_it_sets_and_gets_the_created_time() {
        $file = new \Tsc\CatStorageSystem\File;
        $date = new \DateTime();
        $file->setCreatedTime($date);
        $this->assertEquals($file->getCreatedTime(), $date);
    }

    public function test_it_sets_and_gets_time_modified() {
      $file = new \Tsc\CatStorageSystem\File;
      $date = new \DateTime();
      $file->setCreatedTime($date);
      $modifiedDate = new \DateTime();
      $file->setModifiedTime($modifiedDate);
      $this->assertEquals($file->getModifiedTime(), $modifiedDate);
    }

    public function test_it_sets_and_gets_the_parent_directory() {
      $file = new \Tsc\CatStorageSystem\File;
      $directory = new \Tsc\CatStorageSystem\Directory;
      $file->setParentDirectory($directory);
      $this->assertEquals($file->getParentDirectory(), $directory);
    }

    public function test_it_gets_the_path() {
      $file = new \Tsc\CatStorageSystem\File;
      $directory = new \Tsc\CatStorageSystem\Directory;
      $directory->setName("NewFolder");
      $directory->setPath("/NewFolder");
      $file->setName("NewFile.txt");
      $file->setParentDirectory($directory);
      $this->assertEquals($file->getPath(), "/NewFolder/NewFile.txt");
    }

}
