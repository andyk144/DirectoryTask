<?php

namespace Tsc\CatStorageSystem;

use PHPUnit\Framework\TestCase;
use DateTimeInterface;

class DirectoryTest extends TestCase {

    public function test_it_creates_a_new_instance() {

        $directory = new \Tsc\CatStorageSystem\Directory;
        $this->assertTrue($directory instanceof Directory);
    }

    public function test_it_sets_and_gets_the_directory_name() {

        $directory = new \Tsc\CatStorageSystem\Directory;
        $directory->setName('home');
        $this->assertEquals($directory->getName(), 'home');
    }

    public function test_it_sets_and_gets_created_time() {

        $directory = new \Tsc\CatStorageSystem\Directory;
        $time = new \DateTime();
        $directory->setCreatedTime($time);
        $this->assertEquals($directory->getCreatedTime(), $time);
    }

    public function test_it_set_and_gets_path() {

        $directory = new \Tsc\CatStorageSystem\Directory;
        $directory->setName('phpFolder');
        $directory->setPath('/phpFolder');
        $this->assertEquals($directory->getPath(), '/phpFolder');
    }

    public function test_it_sets_and_gets_subdirectories() {

        $parentDirectory = new \Tsc\CatStorageSystem\Directory;
        $subDirectory = new \Tsc\CatStorageSystem\Directory;
        $parentDirectory->setSubDirectory($subDirectory);
        $this->assertEquals($parentDirectory->getSubDirectories(), [$subDirectory]);
    }

    public function test_it_sets_and_gets_files_in_directory() {

        $parentDirectory = new \Tsc\CatStorageSystem\Directory;
        $file = new \Tsc\CatStorageSystem\File;
        $parentDirectory->setFile($file);
        $this->assertEquals($parentDirectory->getFiles(), [$file]);
    }

    public function test_it_deletes_subdirectories() {

        $parentDirectory = new \Tsc\CatStorageSystem\Directory;
        $subDirectory1 = new \Tsc\CatStorageSystem\Directory;
        $subDirectory2 = new \Tsc\CatStorageSystem\Directory;
        $parentDirectory->setSubDirectory($subDirectory1);
        $parentDirectory->setSubDirectory($subDirectory2);
        $parentDirectory->deleteSubDirectory($subDirectory1);
        $this->assertCount(1, $parentDirectory->getSubDirectories());
    }

    public function test_it_deletes_files_in_directory() {

        $parentDirectory = new \Tsc\CatStorageSystem\Directory;
        $file1 = new \Tsc\CatStorageSystem\File;
        $file2 = new \Tsc\CatStorageSystem\File;
        $parentDirectory->setFile($file1);
        $parentDirectory->setFile($file2);
        $parentDirectory->deleteFile($file1);
        $this->assertCount(1, $parentDirectory->getFiles());
    }



}
