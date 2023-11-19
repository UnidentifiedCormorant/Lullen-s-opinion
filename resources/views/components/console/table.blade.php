@props(['expert'])
{{-- TODO: Понять как  прокидывать нужные данные в компоеннту и отображать в таблице --}}
<div class="space-y-2">
    <p class="{{ $expert == 'expert_1' ? 'text-purple' : 'text-azur' }} ">
        This is what the expert {{ $expert == 'expert_1' ? '1' : '2' }} stumbled upon about the criteria
    </p>
    <table class="table-console text-[12px]">
        <thead>
            <tr>
                <th>&nbsp;</th>
                <th>Время разработки</th>
                <th>Сложность внедрения</th>
                <th style="font-size: 10px">Технологические возможности</th>
                <th>Спрос</th>
                <th>Сложность разработки</th>
                <th>Composition</th>
                <th>Weights</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Время разработки</td>
                <td>1</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Сложность внедрения</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style="font-size: 10px">Технологические возможности</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Спрос</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Сложность разработки</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
