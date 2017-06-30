# chat
A simple chat tool for two people. 
Work on apache2.

系统设计与实现说明：
1.发送信息：点击发送按钮且发送信息不为空时，使用post的方式将发信人及所发信息发给服务器。在服务器端通过键值对获取相应的发信人及信息，存在当天的临时文件与永久信息文件中。
2.文件存储：临时文件以时间命名，如20160630.txt，永久信息文件名为record.txt。主页面上会显示当天的聊天记录，查看历史记录时，可以查看到永久信息文件中的聊天记录。
3.信息读取：采用setInterval的方式不断访问服务器，使用post的方式将主页面中已有信息发给服务器，以“<br>”为关键字拆分信息，逐行与服务器中临时文件信息进行比对。若发现有新信息，则将信息返回到客户端主页面上，并将滚动条移至最下。需注意的是，若用全局变量创建一个ajax对象，虽然减少了资源浪费，却容易产生冲突，导致信息无法正常传回客户端。解决方案是，设置一个全局ajax对象用于读取信息，因其交互次数多，全局变量可减少资源浪费。对于其他的客户端服务器交互过程，则采用临时变量创建新的ajax对象。
4.添加表情：表情框的滑动用了jQuery的slideUp(),slideToggle()等函数。点击相应表情的div触发事件，将相应字符添加到文本框中。
