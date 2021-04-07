<?php
namespace metastore;

/**
 * Autogenerated by Thrift Compiler (0.13.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;

class GetPartitionsResponse
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'partitionSpec',
            'isRequired' => false,
            'type' => TType::LST,
            'etype' => TType::STRUCT,
            'elem' => array(
                'type' => TType::STRUCT,
                'class' => '\metastore\PartitionSpec',
                ),
        ),
    );

    /**
     * @var \metastore\PartitionSpec[]
     */
    public $partitionSpec = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['partitionSpec'])) {
                $this->partitionSpec = $vals['partitionSpec'];
            }
        }
    }

    public function getName()
    {
        return 'GetPartitionsResponse';
    }


    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 1:
                    if ($ftype == TType::LST) {
                        $this->partitionSpec = array();
                        $_size1103 = 0;
                        $_etype1106 = 0;
                        $xfer += $input->readListBegin($_etype1106, $_size1103);
                        for ($_i1107 = 0; $_i1107 < $_size1103; ++$_i1107) {
                            $elem1108 = null;
                            $elem1108 = new \metastore\PartitionSpec();
                            $xfer += $elem1108->read($input);
                            $this->partitionSpec []= $elem1108;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('GetPartitionsResponse');
        if ($this->partitionSpec !== null) {
            if (!is_array($this->partitionSpec)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('partitionSpec', TType::LST, 1);
            $output->writeListBegin(TType::STRUCT, count($this->partitionSpec));
            foreach ($this->partitionSpec as $iter1109) {
                $xfer += $iter1109->write($output);
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}