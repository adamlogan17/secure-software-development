#include <stdio.h> 
#include <stdlib.h> 
#include <string.h> 

void Hacked(void){
    int nbytes = 80;
    char *name = malloc(nbytes+1);
    printf("\n\n\n");
    printf("*******************************************************\n*\n");
    printf("* Please enter your name and student ID\n");
    printf("* Maximun %i characters\n", nbytes);
    printf("*\n*\n* ");
    getline(&name, &nbytes ,stdin);
    printf("*\n*\n*");
    printf("*******************************************************\n*\n");
    printf("*\n*\t\tBuffer Overflow Attack\n");
    printf("*\t\t----------------------\n*\n");
    printf("* %s",name);
    printf("*\n");
    printf("* You have sucessfully completed this task\n");
    printf("*\n*\n");
    printf("* Function Hacked at\t0x00%x\n",&Hacked);
    printf("*\n");
    printf("* Stack contents\t0x%p --> Return address\n*\t\t\t0x%p\n*\t\t\t0x%p\n*\t\t\t0x%p\n*\t\t\t0x%p\n");
    printf("*\n*******************************************************\n\n");
}

void displayStack(const char input[]){ 
    char buf[8]; 
    printf("--------------------------------------\n"); 
    printf("Before attack stack looks\n\t\t\t0x%p\n\t\t\t0x%p\n\t\t\t0x%p\n\t\t\t0x%p\n\t\t\t0x%p\n\t\t\t0x%p\n\t\t\t0x%p\n\t\t\t0x%p\n\t\t\t0x%p\n\t\t\t0x%p\n\t\t\t0x%p\n"); 
    strcpy(buf, input); 
    printf("\nBuffer \n\t\t\t%s\n\n", buf); 
    printf("After attack stack looks\n\t\t\t0x%p\n\t\t\t0x%p\n\t\t\t0x%p\n\t\t\t0x%p\n\t\t\t0x%p\n\t\t\t0x%p\n\t\t\t0x%p\n\t\t\t0x%p\n\t\t\t0x%p\n\t\t\t0x%p\n\t\t\t0x%p\n"); 
    printf("--------------------------------------\n"); 
} 

int main(int argc, char* argv[]){ 
    int tempVar=0; 
    //Making life easy 
    printf("There is a buffer overflow weakness in this function\n"); 
    printf("You are required to call the function at address 0x%x\n", &Hacked); 
    if (argc != 2) { 
    printf("Please supply a string as your attack argument!\n"); 
    return -1; 
    } 
    displayStack(argv[1]); 
    return 0; 
}