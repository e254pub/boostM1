# Git rebase
Команда, которая позволяет изменять историю коммитов в репозитории. Она часто используется для улучшения читаемости истории коммитов, объединения коммитов, перемещения коммитов на другие ветки, а также для исправления ошибок в прошлых коммитах.

Основными преимуществами использования git rebase являются:

1. Чистая история: с помощью git rebase можно объединить несколько коммитов в один, чтобы сделать историю более логичной и понятной. Это особенно полезно при работе с командами, когда каждый разработчик может создавать много небольших, независимых коммитов.

2. Удаление ненужных коммитов: используя git rebase, можно легко удалить нежелательные коммиты из истории, что позволяет поддерживать репозиторий чистым и аккуратным.

3. Исправление ошибок: git rebase позволяет вам исправлять ошибки в прошлых коммитах. Вы можете переписать сообщение коммита, изменить файлы, а также изменить порядок коммитов в зависимости от вашей потребности.

## Interactive rebase
Interactive rebase - это особый режим git rebase, который предоставляет еще больше возможностей для работы с историей коммитов. В интерактивном режиме вы можете выбирать определенные коммиты, с которыми хотите работать, и выполнять различные операции над ними, такие как объединение, перемещение или редактирование.

Примеры использования git rebase и interactive rebase:

1. Объединение коммитов:
```shell
git rebase -i HEAD~3
```

Откроется интерактивный режим, в котором вы можете выбрать коммиты, которые хотите объединить. Затем вы можете указать команду "squash" или "fixup" рядом с этими коммитами, чтобы объединить их в один.

2. Перемещение коммитов на другую ветку:
```shell
git rebase --onto <target-branch> <source-branch>
```

Эта команда перемещает все коммиты из <source-branch> на <target-branch> и применяет их к <target-branch>.

3. Редактирование коммитов:
```shell
git rebase -i HEAD~2
```

Выберите коммиты, которые вы хотите отредактировать, и замените команду "pick" на "edit". Затем можно внести необходимые изменения в файлы или сообщения коммитов с помощью команд "git add" и "git commit --amend".

Важно помнить, что при использовании git rebase изменяется история коммитов, поэтому это должно использоваться только тогда, когда ветка, которую вы хотите изменить, не разделялась с другими разработчиками. При работе с общей веткой рекомендуется использовать git merge.