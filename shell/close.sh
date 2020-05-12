#!/bin/bash

# 通过进程名称关闭进程，并且记录进程具体名称和关闭时间
# 获取进程名称
name=$1
echo "----------"
echo 'killing ->' $name

if [ "$name" == '' ]
then
	echo '请输入需要关闭的进程名称'
fi


# 通过名称获取进程列表
arrs=$(ps -ef | grep "$name"|grep -v grep|grep -v /bin/bash| awk '{print $2,$8}')
loopNu=1
colNu=2
for arr in $arrs
	do 
	# 杀掉进程
	yu=`expr $loopNu % $colNu`
	if [ $yu == 1 ]
       	then
		# kill -9 $arr
		echo '进程被杀死:' $arr >> close.log
	fi
	# 记录日志
	if [ $yu == 0 ] 
	then
		echo '进程名为：name=' $arr  >> close.log
		echo -e '杀死时间为：' $(date "+%Y-%m-%d %H:%M:%S") '\n'  >> close.log
	fi
	loopNu=`expr $loopNu + 1`
	
	done
echo "----------"






















