import React from "react";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import {
   Form,
   FormControl,
   FormField,
   FormItem,
   FormLabel,
   FormMessage,
} from "@/components/ui/form";
import { Input } from "@/components/ui/input";
import { useForm } from "react-hook-form";
import { Button } from "@/components/ui/button";
import { zodResolver } from "@hookform/resolvers/zod";
import z from "zod";
import axios, { AxiosError } from "axios";
import { PasswordInput } from "./password-input";

const signUpSchema = z
   .object({
      email: z.email(),
      username: z
         .string()
         .min(3, "Username must be at least 3 characters long."),
      password: z
         .string()
         .min(6, "Password must be at least 6 characters long."),
      confirmPassword: z
         .string()
         .min(6, "Password must be at least 6 characters long."),
   })
   .refine(
      ({ password, confirmPassword }) => {
         return password === confirmPassword;
      },
      {
         message: "Passwords do not match",
         path: ["confirmPassword"],
      }
   );

type SignUpSchema = z.infer<typeof signUpSchema>;

export default function SignUp() {
   const signUpForm = useForm({
      resolver: zodResolver(signUpSchema),
      defaultValues: {
         email: "",
         password: "",
         confirmPassword: "",
         username: "",
      },
   });

   async function handleSignUp(values: SignUpSchema) {
      try {
         const response = await axios.post("/api/admin/sign-up", values);
      } catch (error) {
         if (error instanceof AxiosError) {
            if (error.status === 401) {
               const {
                  response: {
                     data: { error: message },
                  },
               } = error;
               signUpForm.setError("email", { message });
               signUpForm.setError("password", { message });
            }
         }
      }
   }

   return (
      <section className="min-h-screen content-center">
         <div className="container">
            <Card className="max-w-lg mx-auto">
               <CardHeader>
                  <CardTitle className="text-center">Request Access</CardTitle>
               </CardHeader>
               <CardContent>
                  <Form {...signUpForm}>
                     <form onSubmit={signUpForm.handleSubmit(handleSignUp)}>
                        <FormField
                           name="username"
                           render={({ field }) => (
                              <FormItem>
                                 <FormLabel>Username</FormLabel>
                                 <FormControl>
                                    <Input {...field} type="text" />
                                 </FormControl>
                                 <FormMessage />
                              </FormItem>
                           )}
                        />
                        <div className="mt-4">
                           <FormField
                              name="email"
                              render={({ field }) => (
                                 <FormItem>
                                    <FormLabel>Email</FormLabel>
                                    <FormControl>
                                       <Input {...field} type="email" />
                                    </FormControl>
                                    <FormMessage />
                                 </FormItem>
                              )}
                           />
                        </div>
                        <div className="mt-4">
                           <FormField
                              name="password"
                              render={({ field }) => (
                                 <FormItem>
                                    <FormLabel>Password</FormLabel>
                                    <FormControl>
                                       <PasswordInput {...field} />
                                    </FormControl>
                                    <FormMessage />
                                 </FormItem>
                              )}
                           />
                        </div>
                        <div className="mt-4">
                           <FormField
                              name="confirmPassword"
                              render={({ field }) => (
                                 <FormItem>
                                    <FormLabel>Confirm Password</FormLabel>
                                    <FormControl>
                                       <PasswordInput {...field} />
                                    </FormControl>
                                    <FormMessage />
                                 </FormItem>
                              )}
                           />
                        </div>
                        <div className="grid mt-4">
                           <Button>Submit</Button>
                        </div>
                     </form>
                  </Form>
               </CardContent>
            </Card>
         </div>
      </section>
   );
}
