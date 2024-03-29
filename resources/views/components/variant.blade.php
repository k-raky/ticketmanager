
@inject('dc', 'App\Http\Controllers\Admin\DownloadController')

<div class="variant-container" style="padding-top: {{ $mt ?? 0}}mm; padding-bottom :{{ $mb ?? 0}}mm">
        <div class="top-container" style="padding-top: {{ $ptLogo ?? 0}}mm">
            <div class="variant-text" style="transform: rotateY(180deg);">
                <div>
                    <p>Save your document, save your time: Just Save It </p>
                    <p>Vendu par / Sold by : www.just-save-it.com</p>
                </div>
            </div>
            <div class="logo" style="transform: rotateY(180deg);">
                <div>
                    <p style="margin-bottom : 0" >Please contact me back</p>
                    <p>Merci de me contacter</p>
                </div>
            </div>
        </div>
        <div class="variant-text" style="height: 50%; width:100%; padding-top :{{ $ptInfos ?? 0}}mm">
            <div>
                <p>{{ $dc->formatNumber($info['info1']) }}&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;{{ $dc->formatNumber($info['info2']) }}</p>
                <p>{{ $dc->formatNumber($info['info3']) }}&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;{{ $dc->formatNumber($info['info4']) }}</p>
            </div>
        </div>
</div>