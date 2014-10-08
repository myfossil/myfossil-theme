<?php
namespace myFOSSIL\Plugin\Specimen;

class PluginObjectTest extends \WP_UnitTestCase {

    function test_myFOSSIL_Specimen_Instantiation() {
        $this->assertInstanceOf( 
                __NAMESPACE__ . '\myFOSSIL_Specimen', 
                new myFOSSIL_Specimen
            );
    }

    function test_myFOSSIL_Specimen_Activator_Instantiation() {
        $this->assertInstanceOf( 
                __NAMESPACE__ .  '\myFOSSIL_Specimen_Activator', 
                new myFOSSIL_Specimen_Activator
            );
    }

    function test_myFOSSIL_Specimen_Admin_Instantiation() {
        $this->assertInstanceOf( 
                __NAMESPACE__ . '\myFOSSIL_Specimen_Admin',
                new myFOSSIL_Specimen_Admin( null, null )
            );
    }

    function test_myFOSSIL_Specimen_Deactivator_Instantiation() {
        $this->assertInstanceOf( 
                __NAMESPACE__ .  '\myFOSSIL_Specimen_Deactivator', 
                new myFOSSIL_Specimen_Deactivator
            );
    }

    function test_myFOSSIL_Specimen_Loader_Instantiation() {
        $this->assertInstanceOf( 
                __NAMESPACE__ . '\myFOSSIL_Specimen_Loader',
                new myFOSSIL_Specimen_Loader
            );
    }

    function test_myFOSSIL_Specimen_Public_Instantiation() {
        $this->assertInstanceOf( 
                __NAMESPACE__ . '\myFOSSIL_Specimen_Public',
                new myFOSSIL_Specimen_Public( null, null )
            );
    }

    function test_myFOSSIL_Specimen_i18n_Instantiation() {
        $this->assertInstanceOf( 
                __NAMESPACE__ . '\myFOSSIL_Specimen_i18n', 
                new myFOSSIL_Specimen_i18n
            );
    }

}

