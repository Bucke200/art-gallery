#include <stdio.h>
#include <stdlib.h>
#include <string.h>

struct node {
    struct node *link;
    int prn;
    char name[20];
    int year;
};

struct node *createnode(int prn, char name[], int year) {
    struct node *temp = (struct node *)malloc(sizeof(struct node));
    temp->link = NULL;
    strcpy(temp->name, name);
    temp->prn = prn;
    temp->year = year;
    return temp;
}

int addnode(struct node **head) {
    printf("Enter number of students you want to add: ");
    int num;
    scanf("%d", &num);
    struct node *curr = *head;

    for (int i = 0; i < num; i++) {
        int prn, year;
        char name[20];
        printf("Enter PRN of student: ");
        scanf("%d", &prn);
        printf("Enter name of student: ");
        scanf("%s", name);
        printf("Enter year of student (2 or above): ");
        scanf("%d", &year);

        if (year == 1) {
            printf("First-year students cannot be added.\n");
            continue;
        }

        struct node *temp = createnode(prn, name, year);
        curr->link = temp;
        curr = temp;
    }
    return curr;
}

void removeStudent(struct node **head, int prn) {
    struct node *curr = *head;
    struct node *prev = NULL;

    while (curr != NULL) {
        if (curr->prn == prn) {
            if (prev == NULL) {
                *head = curr->link;
            } else {
                prev->link = curr->link;
            }
            free(curr);
            printf("Student with PRN %d removed.\n", prn);
            return;
        }
        prev = curr;
        curr = curr->link;
    }
    printf("Student with PRN %d not found.\n", prn);
}

void sortList(struct node **head) {
    if (*head == NULL) return;

    struct node *current, *index;
    int tempPRN, tempYear;
    char tempName[20];

    for (current = *head; current->link != NULL; current = current->link) {
        for (index = current->link; index != NULL; index = index->link) {
            if (current->prn > index->prn) {
                tempPRN = current->prn;
                current->prn = index->prn;
                index->prn = tempPRN;

                strcpy(tempName, current->name);
                strcpy(current->name, index->name);
                strcpy(index->name, tempName);

                tempYear = current->year;
                current->year = index->year;
                index->year = tempYear;
            }
        }
    }
}

void reverseList(struct node **head) {
    struct node *prev = NULL;
    struct node *curr = *head;
    struct node *next = NULL;

    while (curr != NULL) {
        next = curr->link;
        curr->link = prev;
        prev = curr;
        curr = next;
    }
    *head = prev;
}

int lengthOfList(struct node *head) {
    int count = 0;
    while (head != NULL) {
        count++;
        head = head->link;
    }
    return count;
}

void printList(struct node *head) {
    struct node *curr = head;
    while (curr != NULL) {
        printf("PRN: %d, Name: %s, Year: %d\n", curr->prn, curr->name, curr->year);
        curr = curr->link;
    }
}

int main() {
    struct node *head = NULL;
    struct node *president = createnode(0, "", 0);
    head = president;

    printf("Enter PRN of president: ");
    scanf("%d", &president->prn);
    printf("Enter name of president: ");
    scanf("%s", president->name);
    printf("Enter year of president (2 or above): ");
    scanf("%d", &president->year);

    struct node *secretary = createnode(0, "", 0);
    printf("Enter PRN of secretary: ");
    scanf("%d", &secretary->prn);
    printf("Enter name of secretary: ");
    scanf("%s", secretary->name);
    printf("Enter year of secretary (2 or above): ");
    scanf("%d", &secretary->year);

    if (secretary->year == 1) {
        printf("First-year students cannot be added.\n");
        free(secretary);
        secretary = NULL;
    }

    struct node *lastNode = addnode(&head);
    if (secretary) {
        lastNode->link = secretary;
    }

    int choice, prnToRemove;

    do {
        printf("\nMenu:\n");
        printf("1. Print all students\n");
        printf("2. Remove a student\n");
        printf("3. Sort students\n");
        printf("4. Reverse the members\n");
        printf("5.No of Students\n");
        printf("6. Exit\n");
        printf("Enter your choice: ");
        scanf("%d", &choice);

        switch (choice) {
            case 1:
                printList(head);
                break;
            case 2:
                printf("Enter PRN of student to remove: ");
                scanf("%d", &prnToRemove);
                removeStudent(&head, prnToRemove);
                break;
            case 3:
                sortList(&head);
                printf("Students sorted.\n");
                break;
            case 4:
                reverseList(&head);
                printf("Students reversed.\n");
                break;
            case 5:
                printf("Number of the students: %d\n", lengthOfList(head));
                break;
            case 6:
                printf("Exiting...\n");
                break;
            default:
                printf("Invalid choice. Please try again.\n");
        }
    } while (choice != 6);

    return 0;
}
