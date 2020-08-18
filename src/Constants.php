<?php

namespace Getcourse;

class Constants
{
	/**
	 * Коды статусов заказа (deal_status)
	 */

	/** @var string Новый */
	const DEAL_STATUS_NEW = 'new';

	/** @var string Завершен */
	const DEAL_STATUS_PAYED = 'payed';

	/** @var string Отменен */
	const DEAL_STATUS_CANCELLED = 'cancelled';

	/** @var string Ложный */
	const DEAL_STATUS_FALSE = 'false';

	/** @var string В работе */
	const DEAL_STATUS_IN_WORK = 'in_work';

	/** @var string Ожидаем оплаты */
	const DEAL_STATUS_PAYMENT_WAITING = 'payment_waiting';

	/** @var string Частично оплачен */
	const DEAL_STATUS_PART_PAYED = 'part_payed';

	/** @var string Ожидаем возврата */
	const DEAL_STATUS_WAITING_FOR_RETURN = 'waiting_for_return';

	/** @var string Не подтвержден */
	const DEAL_STATUS_NOT_CONFIRMED = 'not_confirmed';

	/** @var string Отложен */
    const DEAL_STATUS_PENDING = 'pending';


	/**
	 * Коды статусов платежей (payment_status)
	 */

	/** @var string Ожидается */
	const PAYMENT_STATUS_EXPECTED = 'expected';

	/** @var string Получен */
	const PAYMENT_STATUS_ACCEPTED = 'accepted';

	/** @var string Возвращен */
	const PAYMENT_STATUS_RETURNED = 'returned';

	/** @var string Пополнение баланса */
	const PAYMENT_STATUS_TOBALANCE = 'tobalance';

	/** @var string Списание с баланса */
	const PAYMENT_STATUS_FROMBALANCE = 'frombalance';

	/** @var string Начислен на депозит */
	const PAYMENT_STATUS_RETURNED_TO_BALANCE = 'returned_to_balance';


	/**
	 * Коды методов оплаты (payment_type)
	 */

	/** @var string 2Checkout */
	const PAYMENT_TYPE_2CO = '2CO';

	/** @var string Альфа-банк */
	const PAYMENT_TYPE_ALFA = 'ALFA';

	/** @var string Безналичный расчёт */
	const PAYMENT_TYPE_BILL = 'BILL';

	/** @var string Банковской картой */
	const PAYMENT_TYPE_CARD = 'CARD';

	/** @var string Банковская карта через терминал */
	const PAYMENT_TYPE_CARD_TERMINAL = 'CARD_TERMINAL';

	/** @var string Наличные */
	const PAYMENT_TYPE_CASH = 'CASH';

	/** @var string CloudPayments */
	const PAYMENT_TYPE_CLOUD_PAYMENTS = 'cloud_payments';

	/** @var string CloudPaymentsKz */
	const PAYMENT_TYPE_CLOUD_PAYMENTS_KZ = 'cloud_payments_kz';

	/** @var string Fondy */
	const PAYMENT_TYPE_FONDY = 'fondy';

	/** @var string Хуткi Грош */
	const PAYMENT_TYPE_HUTKI_GROSH = 'hutki_grosh';

	/** @var string Интеркасса */
	const PAYMENT_TYPE_INTERKASSA = 'interkassa';

	/** @var string Внутренний баланс */
	const PAYMENT_TYPE_INTERNAL = 'INTERNAL';

	/** @var string Justclick */
	const PAYMENT_TYPE_JUSTCLICK = 'justclick';

	/** @var string Квитанция в банк */
	const PAYMENT_TYPE_KVIT = 'kvit';

	/** @var string Другое */
	const PAYMENT_TYPE_OTHER = 'OTHER';

	/** @var string PayAnyWay */
	const PAYMENT_TYPE_PAYANYWAY = 'payanyway';

	/** @var string PayPal */
	const PAYMENT_TYPE_PAYPAL = 'PAYPAL';

	/** @var string Perfect Money */
	const PAYMENT_TYPE_PERFECT_MONEY = 'perfect_money';

	/** @var string Perfect Money */
	const PAYMENT_TYPE_PERFECTMONEY = 'PERFECTMONEY';

	/** @var string Qiwi */
	const PAYMENT_TYPE_QIWI = 'QIWI';

	/** @var string Системы быстрых переводов */
	const PAYMENT_TYPE_QUICKTRANSFER = 'QUICKTRANSFER';

	/** @var string РБК Деньги */
	const PAYMENT_TYPE_RBK = 'RBK';

	/** @var string РБК Деньги (устаревшее) */
	const PAYMENT_TYPE_RBKMONEY = 'rbkmoney';

	/** @var string РБК Деньги (2018 г) */
	const PAYMENT_TYPE_RBKMONEY_NEW = 'rbkmoney_new';

	/** @var string Робокасса */
	const PAYMENT_TYPE_ROBOKASSA = 'ROBOKASSA';

	/** @var string Sberbank */
	const PAYMENT_TYPE_SBER = 'SBER';

	/** @var string Сбербанк эквайринг */
	const PAYMENT_TYPE_SBERBANK = 'sberbank';

	/** @var string Тинькофф Банк */
	const PAYMENT_TYPE_TINKOFF = 'tinkoff';

	/** @var string Тинькофф Кредит */
	const PAYMENT_TYPE_TINKOFFCREDIT = 'tinkoffcredit';

	/** @var string Бонусный счет */
	const PAYMENT_TYPE_VIRTUAL = 'VIRTUAL';

	/** @var string Единая касса */
	const PAYMENT_TYPE_WALLETONE = 'walletone';

	/** @var string WayForPay */
	const PAYMENT_TYPE_WAYFORPAY = 'wayforpay';

	/** @var string Webmoney */
	const PAYMENT_TYPE_WEBMONEY = 'WEBMONEY';

	/** @var string Яндекс.Касса */
	const PAYMENT_TYPE_YANDEX_KASSA = 'yandex_kassa';

	/** @var string Яндекс.Деньги */
	const PAYMENT_TYPE_YANDEXMONEY = 'YANDEXMONEY';

	/** @var string Z-payment */
	const PAYMENT_TYPE_ZPAYMENT = 'ZPAYMENT';


	/**
	 * Коды валют
	 */

	/** @var string Российский рубль */
	const CURRENCY_RUB = 'RUB';

	/** @var string Доллар США */
	const CURRENCY_USD = 'USD';

	/** @var string Евро */
	const CURRENCY_EUR = 'EUR';

	/** @var string Фунт стерлингов Велико­британии */
	const CURRENCY_GBP = 'GBP';

	/** @var string Белорусский рубль (01.01.2000 — 01.07.2016) */
	const CURRENCY_BYR = 'BYR';

	/** @var string Белорусский рубль (с 01.07.2016) */
	const CURRENCY_BYN = 'BYN';

	/** @var string Казахский тенге */
	const CURRENCY_KZT = 'KZT';

	/** @var string Украинская гривна */
	const CURRENCY_UAH = 'UAH';

	/** @var string Австралийский доллар */
	const CURRENCY_AUD = 'AUD';

	/** @var string Датская крона */
	const CURRENCY_DKK = 'DKK';

	/** @var string Швейцарский франк */
	const CURRENCY_CHF = 'CHF';

	/** @var string Шведская крона */
	const CURRENCY_SEK = 'SEK';

	/** @var string Южно-африканский рэнд */
	const CURRENCY_ZAR = 'ZAR';

	/** @var string Армянский драм */
	const CURRENCY_AMD = 'AMD';

	/** @var string Новый румынский лей */
	const CURRENCY_RON = 'RON';

	/** @var string Бразильский реал */
	const CURRENCY_BRL = 'BRL';
}
