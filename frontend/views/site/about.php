<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="about">
    <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
        <div class="about-wrapper">
            <div class="about-img">
                <picture>
                    <img src="/images/del/about.jpg" alt="">
                </picture>
            </div>
            <div class="development-wrapper about-desc">
                <p class="cap">о компании</p>
                <p class="title">Royal development</p>
                <div class="development-text">
                    “Royal development” - это премиальный жилой комплекс на 1-й береговой линии, в 150 метрах от моря. В продаже  апартаменты комфорт и бизнес класса от 28 кв.метров с видом на море и горы.
                </div>
                <div class="development-items">
                    <div class="development-item">
                        <span class="radius">
                            <svg width="18" height="18"><use xlink:href="/images/icons.svg#anchor"></use></svg>
                        </span>
                        <p>Близко к морю 150 метров</p>
                    </div>
                    <div class="development-item">
                        <span class="radius">
                            <svg width="18" height="18"><use xlink:href="/images/icons.svg#key"></use></svg>
                        </span>
                        <p>Планировочные решения от 28 кв.</p>
                    </div>
                    <div class="development-item">
                        <span class="radius">
                            <svg width="18" height="18"><use xlink:href="/images/icons.svg#hotel"></use></svg>
                        </span>
                        <p>Архитектура и концепция ЖК</p>
                    </div>
                    <div class="development-item">
                        <span class="radius">
                            <svg width="18" height="18"><use xlink:href="/images/icons.svg#secure"></use></svg>
                        </span>
                        <p>Надежный застройщик и аккредитация банка</p>
                    </div>
                    <div class="development-item">
                        <span class="radius">
                            <svg width="19" height="18"><use xlink:href="/images/icons.svg#money"></use></svg>
                        </span>
                        <p>Условия приобретения и ценовая политика</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
