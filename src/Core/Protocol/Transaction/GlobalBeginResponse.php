<?php

namespace Hyperf\Seata\Core\Protocol\Transaction;


use Hyperf\Seata\Core\Protocol\MessageType;

class GlobalBeginResponse extends AbstractTransactionResponse
{

    /**
     * @var string
     */
    private $xid = '';

    /**
     * @var string
     */
    private $extraData = '';

    public function getXid(): string
    {
        return $this->xid;
    }

    /**
     * @return $this
     */
    public function setXid(string $xid)
    {
        $this->xid = $xid;
        return $this;
    }

    public function getExtraData(): string
    {
        return $this->extraData;
    }

    /**
     * @return $this
     */
    public function setExtraData(string $extraData)
    {
        $this->extraData = $extraData;
        return $this;
    }

    public function getTypeCode(): int
    {
        return MessageType::TYPE_GLOBAL_BEGIN_RESULT;
    }
}