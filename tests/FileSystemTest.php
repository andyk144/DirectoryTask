<?php

namespace Tsc\CatStorageSystem;

use PHPUnit\Framework\TestCase;
use DateTimeInterface;

class FileSystemTest extends TestCase {

    public function test_it_creates_a_new_instance() {

        $fileSystem = new \Tsc\CatStorageSystem\FileSystem;
        $this->assertTrue($fileSystem instanceof FileSystem);
    }

    // public function test_it_creates_a_root_directory() {
    //
    //     $fileSystem = new \Tsc\CatStorageSystem\FileSystem;
    //     $rootDirectory = new \Tsc\CatStorageSystem\Directory;
    //     $fileSystem->createRootDirectory($rootDirectory);
    //     $this->assertEquals($fileSystem->getRootDir(), $rootDirectory);
    // }
    //
    // public function test_it_raises_an_exception_if_root_file_exists() {
    //
    //     $this->expectException(\Tsc\CatStorageSystem\RootFileExistsException::class);
    //
    //     $fileSystem = new \Tsc\CatStorageSystem\FileSystem;
    //     $rootDirectory1 = new \Tsc\CatStorageSystem\Directory;
    //     $fileSystem->createRootDirectory($rootDirectory1);
    //     $rootDirectory2 = new \Tsc\CatStorageSystem\Directory;
    //     $fileSystem->createRootDirectory($rootDirectory2);
    // }
    //
    // public function test_it_gives_contents() {
    //   $fileSystem = new \Tsc\CatStorageSystem\FileSystem;
    //   $rootDirectory1 = new \Tsc\CatStorageSystem\Directory;
    //
    //   $this->assertEquals($rootDirectory1->getContents(), []);
    // }
    //
    // public function test_it_creates_a_directory_inside_the_root_directory() {
    //
    //   $fileSystem = new \Tsc\CatStorageSystem\FileSystem;
    //   $rootDirectory = new \Tsc\CatStorageSystem\Directory;
    //   $fileSystem->createRootDirectory($rootDirectory);
    //   $subDirectory = new \Tsc\CatStorageSystem\Directory;
    //   $fileSystem->createDirectory($subDirectory, $rootDirectory);
    //   $this->assertEquals($rootDirectory->getContents(), [$subDirectory]);
    // }
    //
    // public function test_it_creates_a_file_inside_the_root_directory() {
    //   $fileSystem = new \Tsc\CatStorageSystem\FileSystem;
    //   $rootDirectory = new \Tsc\CatStorageSystem\Directory;
    //   $fileSystem->createRootDirectory($rootDirectory);
    //   $file = new \Tsc\CatStorageSystem\File;
    //   $fileSystem->createFile($file, $rootDirectory);
    //   $this->assertEquals($rootDirectory->getContents(), [$file]);
    // }

    // public function test_it_sets_the_root_path() {
    //   $fileSystem = new \Tsc\CatStorageSystem\FileSystem;
    //   $rootDirectory = new \Tsc\CatStorageSystem\Directory;
    //   $rootDirectory->setName("NewDir");
    //   $fileSystem->createRootDirectory($rootDirectory);
    //   $result = getcwd() . "NewDir";
    //   $this->assertEquals($rootDirectory->getPath(), $result);
    // }

    // public function test_it_renames_a_file() {
    //   $fileSystem = new \Tsc\CatStorageSystem\FileSystem;
    //   $rootDirectory = new \Tsc\CatStorageSystem\Directory;
    //   $file = new \Tsc\CatStorageSystem\File;
    //   $file->setName("File_1.txt");
    //   $fileSystem->createRootDirectory($rootDirectory);
    //   $fileSystem->createFile($file, $rootDirectory);
    //   $fileSystem->renameFile($file, "File_changed.txt");
    //   $this->assertEquals($file->getName(), "File_changed.txt");
    // }
    //
    // public function test_it_deletes_a_file() {
    //   $fileSystem = new \Tsc\CatStorageSystem\FileSystem;
    //   $rootDirectory = new \Tsc\CatStorageSystem\Directory;
    //   $file = new \Tsc\CatStorageSystem\File;
    //   $file1 = new \Tsc\CatStorageSystem\File;
    //   $fileSystem->createRootDirectory($rootDirectory);
    //   $fileSystem->createFile($file1, $rootDirectory);
    //   $fileSystem->deleteFile($file1);
    //   $this->assertEmpty($rootDirectory->getContents());
    // }



}
