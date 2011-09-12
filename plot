set terminal png size 1280, 1024
set output "output.png"
unset title
unset xtics
unset ytics
unset key
plot 'parsed.csv' using 1:2:3 with dots palette
