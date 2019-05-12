{* HEADER *}

<div class="crm-submit-buttons">
{include file="CRM/common/formButtons.tpl" location="top"}
</div>
<table class="form-layout">
  <tr>
    <td colspan="2">Sending SMS to {$displayName} on number {$phone} </td>
  </tr>
  <tr>
    <td>{$form.message.label}</td>
    <td>{$form.message.html}</td>
  </tr>
</table>
{* FOOTER *}
<div class="crm-submit-buttons">
{include file="CRM/common/formButtons.tpl" location="bottom"}
</div>
