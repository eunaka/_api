{{home}}<br>
{{return}}<br>
{{return2}}<br>
<h3>pathTo returns</h3>
<strong>pathTo.jsFolder:</strong> {{jsFolder}}<br>
<strong>pathTo.directivesFolder:</strong> {{directivesFolder}}<br>



<!--  Ng-repeat populando lista de checkboxes e passando os valores true para selecionados
checar o controller para entender o processo.
-->
<div ng-repeat="test in testes">
  <label>
    <input type="checkbox" ng-model="selecionados[test.name]" ng-true-value="'true'" ng-false-value="'false'">{{test.name}}
    <br>
  </label>
</div>
{{selecionados}}
