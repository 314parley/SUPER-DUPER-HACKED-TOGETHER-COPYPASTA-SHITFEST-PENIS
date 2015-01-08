{include(file='front_header.tpl')}

<table border="1">
	<thead>
		<th>IP</th>
		<th>Reason</th>
		<th>Boards</th>
		<th>Created</th>
		<th>Expires</th>
		<th>Staff Member</th>
	</thead>
	<tbody>
		{foreach $bans ban}
			<tr {if $.server.REMOTE_ADDR eq md5_decrypt($ban.ip, $seed)} style="background: #FFE4E1"{/if}>
				<td>{mb_strimwidth(md5_decrypt($ban.ip, $seed),7,9,"x.x")}</td>
				<td>{$ban.reason}</td>
				<td>{if $ban.boards eq ''}All{else}{replace $ban.boards "|" " / "}{/if}</td>
				<td nowrap>{date_format $ban.at "%d/%m @ %H:%M:%S"}</td>
				<td nowrap>{if $ban.until eq 0}Never{else}{date_format $ban.until "%d/%m @ %H:%M:%S"}{/if}</td>
				<td>{$ban.by}</td>
			</tr>
		{/foreach}
	</tbody>
</table>

{include(file='front_footer.tpl')}