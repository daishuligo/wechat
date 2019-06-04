<?php

/*
 * This file is part of the overtrue/wechat.
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\MicroMerchant\Withdraw;

use EasyWeChat\MicroMerchant\Kernel\BaseClient;

/**
 * Class Client
 *
 * @author   liuml  <liumenglei0211@163.com>
 * @DateTime 2019-05-30  14:19
 */
class Client extends BaseClient
{
    /**
     * Query withdrawal status.
     *
     * @param          $date
     * @param  string  $sub_mch_id
     *
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidArgumentException
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \EasyWeChat\MicroMerchant\Kernel\Exceptions\InvalidSignException
     */
    public function queryWithdrawalStatus($date, $sub_mch_id = '')
    {
        return $this->safeRequest('fund/queryautowithdrawbydate', [
            'date'       => $date,
            'sign_type'  => 'HMAC-SHA256',
            'nonce_str'  => uniqid('micro'),
            'sub_mch_id' => $sub_mch_id ? : $this->app['config']->sub_mch_id,
        ]);
    }

    /**
     * Re-initiation of withdrawal.
     *
     * @param          $date
     * @param  string  $sub_mch_id
     *
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidArgumentException
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \EasyWeChat\MicroMerchant\Kernel\Exceptions\InvalidSignException
     */
    public function reAutoWithdrawByDate($date, $sub_mch_id = '')
    {
        return $this->safeRequest('fund/reautowithdrawbydate', [
            'date'       => $date,
            'sign_type'  => 'HMAC-SHA256',
            'nonce_str'  => uniqid('micro'),
            'sub_mch_id' => $sub_mch_id ? : $this->app['config']->sub_mch_id,
        ]);
    }
}
