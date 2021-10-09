<?php

namespace Hyperf\Seata\Core\Codec\Seata\Protocol;


use Hyperf\Seata\Core\Codec\Seata\MessageSeataCodecInterface;
use Hyperf\Seata\Core\Protocol\Codec\Strings;
use Hyperf\Utils\Buffer\ByteBuffer;

abstract class AbstractMessageCodec implements MessageSeataCodecInterface
{

    protected function putProperty(ByteBuffer $buffer, ?string $string, $lengthBits = 16)
    {
        $methodName = 'putUInt' . $lengthBits;
        if ($string !== null) {
            $string = new Strings($string);
            $bytes = $string->getBytes();
            $count = count($bytes);
            $buffer->$methodName($count);
            if ($count > 0) {
                foreach ($bytes as $byte) {
                    $buffer->putUByte($byte);
                }
            }
        } else {
            $buffer->$methodName(0);
        }
    }

}