#!/usr/bin/Rscript
data=read.table("parsed.csv",sep=" ")
avgx=mean(data[,1],na.rm=TRUE)
avgy=mean(data[,2],na.rm=TRUE)
dists=floor(1000*sqrt((data[,1]-avgx)*(data[,1]-avgx)+(data[,2]-avgy)*(data[,2]-avgy)))/1000
distHist=table(dists)
write.table(distHist,"distHist.csv",quote=FALSE, sep=" ")
